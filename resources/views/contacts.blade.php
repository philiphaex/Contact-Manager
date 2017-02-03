@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Voeg een nieuw contact toe
            </div>
            <div class="panel-body">
                    <div clas="row"></div>
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                    <form action="{{ url('contact') }}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <!-- Contact -->
                        <div class="form-group">
                            <label for="firstname">Voornaam</label>
                            <input type="text" class="form-control" name='firstname' id="contact-firstname"
                                   placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="firstname">Achternaam</label>
                            <input type="text" class="form-control" name='lastname' id="contact-lastname"
                                   placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="firstname">Email</label>
                            <input type="text" class="form-control" name='email' id="contact-email" placeholder="">
                        </div>


                        <!-- Add Task Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Voeg toe
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- Current Tasks -->
    @if (count($contacts) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Contacts
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <!-- Contact Name -->
                            <td class="table-text">
                                <div>{{ $contact->firstname }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $contact->lastname }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $contact->email }}</div>
                            </td>

                            <td>
                                <!-- Delete Button -->
                                <form action="{{ url('contact/'.$contact->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection