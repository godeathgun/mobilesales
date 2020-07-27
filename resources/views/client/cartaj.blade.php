@if(Session::has('cart')!=null)
    {{-- <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;"
        xml:space="preserve">
        <g>
            <path
                d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
            c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
            C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
            H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
            c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z" />
        </g>
    </svg> --}}
    <div>Cart <span>({{ Session::has('cart')?Session::get('cart')->totalQuantity : '0' }})</span></div>
    <div class="hassubs ">
        <br>
        <ul>
            <table style="border-collapse: collapse;" width="250">
                <tbody>
                    @foreach ($cart->items as $item)
                    <tr>
                        <td style="padding-top: 0px"><img src="\images\product\{{$item['product_image'] }}" width="50" height="60">
                        </td>
                        <td style="padding-left: 18px;padding-right: 18px padding-bottom: 20px; ">
                            <div >
                                
                                <p style="color: #e7ab3c;
                                line-height: 30px;
                                margin-bottom: 7px;">{{number_format($item['product_price']).' ' }}x {{$item['qty'] }}</p>
                                <h6 style="color: #232530;font-size: 16px;"> {{$item['product_name'] }} </h6>

                            </div>
                            <hr>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
            <div class="row">
             
                <div class="col-sm-4"> TOTAL
                </div>
                <div class="col-sm-8">{{number_format(Session::get('cart')->totalPrice).' '}}
                </div>
               
            </div>
            
        </ul>
    </div>
    
@endif