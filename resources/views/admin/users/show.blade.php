@extends('admin.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="ro">
                <div class="col-lg-6">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Имя</th>
                                <td>{{$User->first_name}}</td>
                            </tr>
                            <tr>
                                <th>Фамилия</th>
                                <td>{{$User->last_name}}</td>
                            </tr>
                            <tr>
                                <th>Отчество</th>
                                <td>{{$User->second_name}}</td>
                            </tr>
                            <tr>
                                <th>E-Mail</th>
                                <td><a href="{{route('admin.users.sendmail')}}">{{$User->email}}</a></td>
                            </tr>
                            <tr>
                                <th>Группа</th>
                                <td>{{$User->group->title}}</td>
                            </tr>
                            <tr>
                                <th>Роль</th>
                                <td>{{$User->role->title}}</td>
                            </tr>

                            <tr>
                                <th>Дата регистрации</th>
                                <td>{{$User->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">

                </div>
            </div>

        </div>
    </div>
@stop