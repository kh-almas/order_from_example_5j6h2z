<?php

namespace App\Http\Livewire;

use App\Models\Orderform;
use Livewire\Component;
use Livewire\WithFileUploads;

class Order_form extends Component
{
    use WithFileUploads;

    public $fname;
    public $lname;
    public $email;
    public $phone;
    public $addressone;
    public $addresstwo;
    public $state;
    public $city;
    public $zipcode;
    public $info;
    public $cv;
    public $check_cv_field = 0;

    public $addon;
    public $delivery_time;
    public $dealId;
    public $selected_addon =[];
    public $p = [];
    public $submitTime = [];
    public $delivery_time_price = 0;
    public $total_prize = 165.00;
    public $pay_option = 0;

    protected $rules = [
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'addressone' => 'required',
        'state' => 'required',
        'city' => 'required',
        'zipcode' => 'required',
    ];

    protected $messages = [
        'fname.required' => 'This first name field is required.',
        'lname.required' => 'This second name field is required.',
        'email.required' => 'This email field is required.',
        'phone.required' => 'This phone field is required.',
        'addressone.required' => 'This address field is required.',
        'state.required' => 'This state field is required.',
        'city.required' => 'This city field is required.',
        'zipcode.required' => 'This zipcode field is required.',
    ];

    public function proceed()
    {
        $this->validate();
        $this->pay_option = 1;
    }

    public function edit()
    {
        $this->pay_option = 0;
    }

    public function show_cv_field()
    {
        $this->check_cv_field = 1;
    }

    public function hide_cv_field()
    {
        $this->check_cv_field = 0;
    }

    public function additem($id){
        $addons = Orderform::find($id)->toArray();

        if ($addons['type'] === 'delivery'){
            if ($this->delivery_time_price !== $addons['prize']){
                $this->total_prize -= $this->delivery_time_price;
            }
            if ($this->delivery_time_price == $addons['prize']){
                return redirect()->back()->with('already_added_error', 'Item already added!');
            }
            $this->submitTime = [
                [
                    'title' => $addons['title'],
                    'prize' => $addons['prize'],
                ]
            ];
            $this->total_prize += $addons['prize'];
            $this->delivery_time_price = $addons['prize'];

        }elseif (!in_array($id , $this->p) && $addons['type'] === 'addons') {
            $this->selected_addon[] = [
                'title' => $addons['title'],
                'prize' => $addons['prize'],
            ];
            $this->total_prize += $addons['prize'];
            array_push($this->p, $id);
        }else{
            return redirect()->back()->with('already_added_error', 'Item already added!');
        }
    }

    public function remove_addons($id){
        $find_value = $this->selected_addon[$id];
        $this->total_prize -= $find_value['prize'];
        unset($this->selected_addon[$id]);
        unset($this->p[$id]);
    }

    public function remove_submit_time($id){

        $find_value = $this->submitTime[$id];
        $this->total_prize -= $find_value['prize'];
        unset($this->submitTime[$id]);
        $this->delivery_time_price = 0;
    }

    public function mount()
    {
        $this->delivery_time = Orderform:: where('type', 'delivery')->get();
        $this->addon = Orderform:: where('type', 'addons')->get();
    }

    public function render()
    {
        return view('livewire.order_form');
    }
}
