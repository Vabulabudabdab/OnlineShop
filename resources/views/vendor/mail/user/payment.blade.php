Здравствуйте, {{$email}}
<br>
Вы успешно оплатили заказ!
<br>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tbody>
        <tr>
            <td>ID</td>
            <td>{{$order->id}}</td>
        </tr>
        <tr>
            <td>Название продукта</td>
            <td>{{$order->products->title}}</td>
        </tr>
        <tr>
            <td>Категория</td>
            <td>{{$order->products->categories->title}}</td>
        </tr>
        <tr>

        <tr>
            <td>Картинка товара</td>
            <td><img src="{{asset('storage/'. $order->products->image)}}" style="width: 175px; height: 215px;"/> </td>
        </tr>

        <tr>
            <td>Когда оформлен</td>
            <td>{{$order->created_at}}</td>
        </tr>

        <tr>
            <td>Статус</td>
            <td style="color:{{'#' . $order->current_status->color}}">{{$order->current_status->title}}</td>
        </tr>
        </tbody>
    </table>
</div>
