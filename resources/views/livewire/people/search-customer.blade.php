<div class="">
    <div class="form-group mb-0">
        <label for="customer_id">Customer <span class="text-danger">*</span></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="bi bi-search text-primary"></i>
                </div>
            </div>
            <input wire:keydown.escape="resetQuery" wire:model.live.debounce.500ms="query" type="text"
                class="form-control" placeholder="Type customer name...." wire:model="customer_name" required>
            <input hidden name="customer_id" id="customer_id" value="{{ $selected ? $selected['id'] : '' }}" required>
        </div>
    </div>

    <div wire:loading class="card position-absolute mt-1 border-0" style="z-index: 1;left: 0;right: 0;">
        <div class="card-body shadow">
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>

    @if (!empty($query))
        <div wire:click="resetQuery" class="position-fixed w-100 h-100"
            style="left: 0; top: 0; right: 0; bottom: 0;z-index: 1;"></div>
        @if ($search_results->isNotEmpty())
            <div class="card position-absolute mt-1" style="z-index: 2;left: 0;right: 0;border: 0;">
                <div class="card-body shadow">
                    <ul class="list-group list-group-flush">
                        @foreach ($search_results as $result)
                            <li class="list-group-item list-group-item-action">
                                <a wire:click="resetQuery" wire:click.prevent="selectCustomer({{ $result }})"
                                    href="#">
                                    {{ $result->customer_name }}
                                </a>
                            </li>
                        @endforeach
                        @if ($search_results->count() >= $how_many)
                            <li class="list-group-item list-group-item-action text-center">
                                <a wire:click.prevent="loadMore" class="btn btn-primary btn-sm" href="#">
                                    Load More <i class="bi bi-arrow-down-circle"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        @else
            <div class="card position-absolute mt-1 border-0" style="z-index: 1;left: 0;right: 0;">
                <div class="card-body shadow">
                    <div class="alert alert-warning mb-0">
                        No Customer Found....
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
