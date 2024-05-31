<?php

namespace App\Livewire\People;

use Illuminate\Support\Collection;
use Livewire\Component;
use Modules\People\Entities\Supplier;

class SearchSupplier extends Component
{
    public $query;
    public $search_results;
    public $selected;
    public $how_many;
    public $supplier_id = '';
    public $supplier_name = '';

    public function mount() {
        $this->query = '';
        $this->how_many = 5;
        $this->search_results = Collection::empty();
    }

    public function render() {
        $selected = $this->selected;
        return view('livewire.people.search-supplier', compact('selected'));
    }

    public function updatedQuery() {
        $this->search_results = Supplier::where('supplier_name', 'like', '%' . $this->query . '%')
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

    public function selectSupplier($supplier) {
        $this->selected = $supplier;
        $this->supplier_name = $supplier['supplier_name'];
    }
}
