@extends('Admin.layouts.master')

@section('title', 'الاصناف')
@section('css')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if ($errors->any())
            <div class="alert alert-primary">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="col-sm-12">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                    data-original-title="test"data-bs-target="#exampleModal"><i data-feather="file-plus"></i> </button>
                {{-- ------------------------------------------- ADD Modal ------------------------------------------------- --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">اضافه صنف</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('products.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <div class="input-group"><span class="input-group-text"><i data-feather="file-plus"></i></span>
                                            <input class="form-control" type="text" placeholder="ادخل اسم الصنف" required
                                                name="name">
                                        </div>
                                    </div>
                                  
                                    <div class="mb-3">
                                        <div class="input-group"><span class="input-group-text"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                            <input class="form-control" type="number" placeholder="سعر البيع" required
                                                name="price">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-light" type="button" data-bs-dismiss="modal">اغلاق</button>
                                        <button class="btn btn-primary" type="submit"> حفظ </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Modal --}}

                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">اسم الصنف</th>
                            <th class="text-center">سعر البيع</th>
                            <th class="text-center">العمليات </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($products as $product)
                                <td class="text-center" style="color:red">{{ $product->name }}</td>
                                <td class="text-center" style="color:red">{{ $product->price }}</td>
                                
                                <td class="text-center">
                                    <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                        data-original-title="test"data-bs-target="#edit{{ $product->id }}"><i
                                            data-feather="edit"></i></button>

                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-original-title="test"data-bs-target="#delete{{ $product->id }}"><i
                                            data-feather="trash"></i></button>

                                </td>
                                {{-- ------------------------------------------- Edit Modal ------------------------------------------------- --}}
                                <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">تعديل صنف</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{ route('products.update', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <div class="input-group"><span class="input-group-text"><i data-feather="file-plus"></i></span>
                                                            <input class="form-control" type="text"
                                                                value="{{ $product->name }}" required name="name" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="input-group"><span class="input-group-text"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                            <input class="form-control" type="number"
                                                                value="{{ $product->price }}" required name="price" required>
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="modal-footer">
                                                        <button class="btn btn-light" type="button"
                                                            data-bs-dismiss="modal">اغلاق</button>
                                                        <button class="btn btn-primary" type="submit"> حفظ </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Modal --}}

                                {{-- ------------------------------------------- Delete Modal ------------------------------------------------- --}}
                                <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">حذف صنف </h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('products.destroy', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('Delete')
                                                    <div class="mb-3">
                                                        <h3> هل متاكد من الحذف</h3>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light" type="button"
                                                    data-bs-dismiss="modal">اغلاق</button>
                                                <button class="btn btn-primary" type="submit"> موافق </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
            {{-- End Modal --}}



            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>


@endsection

@section('js')

@endsection
