@extends('tasks')

@section ('dialogBox')

    <form class="form" method="POST" action="{{route('update-task', [$taskForEdit->id])}}">

        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <input type="hidden" name='_method' value="PUT">

        <div class="btn-right">
            <a href="{{ route('main') }}">&#128473</a>
        </div>
    
        <div class="form-group">
            <label>Summary:</label>
            <input type="text" class="form-control" size="17" value="{{ $taskForEdit->summary}}" name="summary"/>
        </div>
    
        <div class="form-group">
            <label>DueDate:</label>        
            <input type="date" class="form-control" value="{{ $taskForEdit->due_date}}" name="due_date"/>
        </div>
    
        <div class="form-group">
            <label>Description:</label>
                <div>
                    <textarea name="description" rows="5" cols="30">{{ $taskForEdit->description}} </textarea>
                </div>
        </div> 
    
        {{-- buttons --}}
        <div>
            <span class="save">
                <button type="submit"> Submit </button>
            </span>

            <span class="btn-right">      
                <a href="{{ route('main') }}"> Cancel </a>
            </span>
        </div>


        @if(count($errors))

            <div class="errorMessageBox">
                
                    <strong> Whoops! </strong> There were some problems with your input. <br/>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

         @endif

    </form>

@endsection