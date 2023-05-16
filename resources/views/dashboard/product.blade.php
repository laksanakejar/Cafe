@extends('link')


<form data-id="{{ $shop }}" action="{{route('checkout')}}" method="POST">
    @csrf
    @php $total = 0 @endphp
    @php $quantity = 1 @endphp
    @php $ongkir = 10000 @endphp
    @php $total += $shop->price * $quantity  @endphp
    <div class="container-cart mt-5">
        <h2>Detail Pembelian</h2>
        <hr>
        <div class="row">
            <div class="col-6">
                <img src="{{asset( $shop['image'])}}" class="cart1" alt="" >
            </div>
            <div class="col-6">  
                <h3>{{$shop->name}}</h3>
                <p>Harga: Rp{{ $shop->price }}</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <label for="quantity">Jumlah:</label>
                <input data-input="quantity" type="number" class="quantity shop-update" name="quantity" value="{{$quantity}}" min="1">
            </div>
            <div class="payment mt-5">
                <h3>Ringkasan Pembayaran</h3>
                <hr>
                <table>
                    <tr>
                        <td>Harga Satuan:</td>
                        <td>Rp.{{ $shop->price}}</td>
                    </tr>
                    <tr>
                        <td>Subtotal:</td>
                        <td>Rp.{{ $shop->price * $shop->quantity }}</td>
                    </tr>
                    <tr>
                        <td>Ongkos Kirim:</td>
                        <td>RP.{{ $ongkir }}</td>
                    </tr>
                    <tr>
                        <td>Total:</td>
                        <td>Rp.{{ $total }}</td>
                    </tr>
                </table>
                <div class="button-cont">
                    <button type="submit">Bayar Sekarang</button>
                    <a href="/Produk" class="btn btn-primary mt-4">Back</a>
                </div>
            </div>
  
        </div>
    </div>
</form>
<script type="text/javascript">
  $(".shop-update").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update_shop') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("form").attr("data-id"), 
                quantity: ele.parents("form").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".cart_remove").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "delete",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("div").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
  
</script>














