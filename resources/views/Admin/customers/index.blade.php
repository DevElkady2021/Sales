@extends('Admin.layouts.master')

@section('title', 'العملاء')
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
                    data-original-title="test"data-bs-target="#exampleModal"><i data-feather="user-plus"></i> </button>
                {{-- ------------------------------------------- ADD Modal ------------------------------------------------- --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">اضافه عميل</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('customers.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <div class="input-group"><span class="input-group-text"><i
                                                    data-feather="user"></i></span>
                                            <input class="form-control" type="text" placeholder="الاسم" name="name" required>
                                          
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group"><span class="input-group-text">@</span>
                                            <input class="form-control" type="email" placeholder="البريد الالكترونى"
                                                name="email"  required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group"><span class="input-group-text"><i
                                                    data-feather="home"></i></span>
                                            <input class="form-control" type="text" placeholder="العنوان" name="address"  required>
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
                            <th class="text-center">الاسم</th>
                            <th class="text-center">العنوان</th>
                            <th class="text-center">البريد الالكترونى </th>
                            <th class="text-center">العمليات </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($customers as $customer)
                                <td class="text-center" style="color:red">{{ $customer->name }}</td>
                                <td class="text-center" style="color:red">{{ $customer->address }}</td>
                                <td class="text-center" style="color:red">{{ $customer->email }}</td>
                                <td class="text-center">
                                    <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                        data-original-title="test"data-bs-target="#edit{{ $customer->id }}"><i
                                            data-feather="edit"></i></button>

                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-original-title="test"data-bs-target="#delete{{ $customer->id }}"><i
                                            data-feather="trash"></i></button>

                                </td>
                                {{-- ------------------------------------------- Edit Modal ------------------------------------------------- --}}
                                <div class="modal fade" id="edit{{ $customer->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">تعديل عميل</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{ route('customers.update', $customer->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <div class="input-group"><span class="input-group-text"><i
                                                                    data-feather="user"></i></span>
                                                            <input class="form-control" type="text"
                                                                value="{{ $customer->name }}" name="name" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="input-group"><span class="input-group-text">@</span>
                                                            <input class="form-control" type="email"
                                                                value="{{ $customer->email }}" name="email" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="input-group"><span class="input-group-text"><i
                                                                    data-feather="home"></i></span>
                                                            <input class="form-control" type="text"
                                                                value="{{ $customer->address }}" name="address" required>
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
                                <div class="modal fade" id="delete{{ $customer->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">حذف عميل</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('customers.destroy', $customer->id) }}"
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
