@extends('Admin.layouts.master')

@section('title', 'فاتوره البيع')
@section('css')

@endsection

@section('content')

    <div class="row">
      <div class="col-sm-6">
       
        <div class="dainfo">
          <h3>اضافة فاتورة  </h3>
        </div>
      </div>
      </div>
      @if ($errors->any())
      <div class="alert alert-primary">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                       
                        <form action="{{ route('invoices.store') }}" method="POST" name="cart">
                          @csrf
                            <div class="row">
                              <div class="col-md-4">
                                <label><strong>التاريخ</strong></label>
                                <input type="date" name="date" class="form-control" id="date" placeholder=" التاريخ">
                              
                              </div>
                               <div class="form-group col-md-8">
                                <label><strong>اسم العميل</strong></label>
                                <select id="customer_id"  name="customer_id" class="form-control">
                                  <option value="">اختر</option>
                                  @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <br>
                            <br>
                            <div class="col-md-12">
                                <table class="table table-bordered table_field" id="table_field">
                                    <thead>
                                      <tr class="thead-dark">
                                        <th style="width: 150px; !important" class="text-center">اسم الصنف</th>
                                        <th class="text-center">الكمية</th>
                                        <th class="text-center">سعر البيع</th>
                                        <th class="text-center">الاجمالى</th>
                                        <th class="text-center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>
                                          <select name="product_id[]" class="form-control SlectBox" onclick="console.log($(this).val())" >
                                          <option value="" selected disabled>حدد الصنف</option>
                                          @foreach ($products as $product)
                                              <option value="{{ $product->id }}"> {{ $product->name }}</option>
                                          @endforeach
                                      </select>
                                      </td>
                                          <td><input type="number" class="form-control qty" name="qty[]"></td>
                                          <td><input  name="price[]" class="form-control price"></td>
                                          <td><input type="text" class="form-control total" name="total[]" readonly></td>
                                          <td><input type="button" class="btn btn-success" name="add" id="add" value="اضافة"></td>
                                      </tr>
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        
                                        <td colspan="3" style="text-align: center"><strong>اجمالـــــــــــــــــــــــى الفاتـــــــــــــورة</strong></td>
                                        <td><input type="text" class="form-control grand_total" name="grand_total" readonly></td>
                                      </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group buttonofff mt-4">
                                    <button type="submit" class="btn btn-info save">حفظ</button>
                                    <button type="button" class="btn btn-outline-secondary">الغاء</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>

@endsection
@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#add').click(function(){
          var  size = $('#table_field tbody').children().length +1;
          var html = '<tr>'+'<td><select name="product_id[]" id="product" class="form-control SlectBox""><option value="" selected disabled>حدد الصنف</option> @foreach ($products as $product)<option value="{{ $product->id }}"> {{ $product->name }}</option>@endforeach</select></td><td><input type="number" class="form-control qty" name="qty[]"></td><td><input id="price" name="price[]" class="form-control"></td><td><input type="text" class="form-control total" name="total[]" readonly></td><td><input type="button" class="btn btn-danger" name="remove" id="remove" value="حذف"></td></tr>';
            $('#table_field').append(html);
        });
        $('#table_field').on('click','#remove',function(){
            $(this).closest('tr').remove();
        });

    });
</script>
<script>
  
function sum(){
  var sum = 0;
    //iterate through each textboxes and add the values
    $(".total").each(function () {

        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
          sum += parseFloat(this.value);
        }

    });
    $('input[name="grand_total"]').val(sum);
    }
    $('table').delegate('.price, .qty','keyup',function(){
            var tr = $(this).parent().parent();
            var price = tr.find('.price').val();
            var qty   = tr.find('.qty').val();
            var amount = price * qty;
            tr.find('.total').val(amount);
            sum();
        });

</script>

@endsection


