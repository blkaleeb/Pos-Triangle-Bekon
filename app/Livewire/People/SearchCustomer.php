<?php

namespace App\Livewire\People;

use Illuminate\Support\Collection;
use Livewire\Component;
use Modules\People\Entities\Customer;

class SearchCustomer extends Component
{

    public $query;
    public $search_results;
    public $selected;
    public $how_many;
    public $customer_id = '';
    public $customer_name = '';

    public function mount() {
        $this->query = '';
        $this->how_many = 5;
        $this->search_results = Collection::empty();
    }

    public function render() {
        $selected = $this->selected;
        return view('livewire.people.search-customer', compact('selected'));
    }

    public function updatedQuery() {
        $this->search_results = Customer::where('customer_name', 'like', '%' . $this->query . '%')
            ->take($this->how_many)->get();
    }

    public function loadMore() {
        $this->how_many += 5;
        $this->updatedQuery();
    }

    public function resetQuery() {
        $this->query = '';
        $this->how_many = 5;
        $this->search_results = Collection::empty();
    }

    public function selectCustomer($customer) {
        $this->selected = $customer;
        $this->customer_name = $customer['customer_name'];
    }
}
