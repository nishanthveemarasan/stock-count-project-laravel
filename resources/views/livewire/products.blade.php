<div>
   <form action="sell_item_data_sample" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label text-md-right">Order NUmber</label>
            <div class="col-sm-12 col-md-4">
                <input class="form-control @error('order_number') is-invalid @enderror" type="text" placeholder="Write the Order Number.." name="order_number">
                @error('order_number')
                    <div class='text-danger'>{{ $message }}</div>
                @enderror
            </div>
        </div>
        
                  
        <div class="card card-box ">
            <h5 class="card-header weight-500">Product Details</h5>
            <div class="card-body">
                    @foreach ($orderProducts as $index => $product)
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label>Item Name</label>
                            <input class="form-control itemNameCheck" list="list_of_name" type="text" wire.model="orderProducts.{{$index}}.name" placeholder="Write the Item Name.." name="orderProducts[{{$index}}]['name']">
                                <datalist id="list_of_name">
                                    @foreach($getName as $id => $name)
                                        <option value="{{$name}}">{{$name}}</option>
                                    @endforeach
                                </datalist>
                                @error('item_name')
                                    <div class='text-danger'>{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <label>Sell Type</label>
                            <select class="custom-select col-12 @error('sell_type') is-invalid @enderror" name="orderProducts[{{$index}}]['type']" wire.model="orderProducts.{{$index}}.type">
                                @foreach($sellType as $type => $description)
                                        <option value="{{$type}}">{{$description}}</option>
                                    @endforeach
                            </select>
                            @error('sell_type')
                                <div class='text-danger'>{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <label>Quantity</label>
                            <input class="form-control @error('number') is-invalid @enderror" value="1" placeholder="Give the number of items..." wire.model="orderProducts.{{$index}}.quantity" type="number" name="orderProducts[{{$index}}]['quantity']">
                                @error('number')
                                    <div class='text-danger'>{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label>Note</label>
                            <textarea class="form-control" style="height: 200%;" wire.model="orderProducts.{{$index}}.note" placeholder="Write your Notes here..." rows="1" name="orderProducts[{{$index}}]['note']"></textarea>
                            @error('note')
                                <div class='text-danger'>{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 mt-md-4">
                        <label></label>
                        <button type="button" class="btn btn-danger float-right" wire:click.prevent="removeProduct({{$index}})">Delete</button>
                    </div>
                </div>
                @endforeach    
        </div>
            
           
        </div>
        

        
        <br>
        <div class="form-group row">
            <div class="col-sm-12 col-md-2">
                <button type="button" class="btn btn-primary btn-block" wire:click.prevent="addProduct">Add Product</button>
            </div>
            <div class="col-sm-12 col-md-2">
                <button type="submit" class="btn btn-primary">Sell</button>
            </div>
        </div>
        
    </form>
</div>
