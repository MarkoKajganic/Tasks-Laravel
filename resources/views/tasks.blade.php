<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/tasks.css') }}">
</head>



<body>
    <div class="container">

        <a href="{{route('create-task')}}">
            <button type="button"> New Task </button>
        </a>
      
        <a href="{{ route('hide')}}">
            <button class="btn-right">
                    Hide compleated tasks
            </button>
        </a>


        <table>

            {{-- TABLE HEADERS --}}
            <tr>
                <th>Summary
                    <a href="{{ route('sort', 'summary')}}">
                        <button class="btn-right"> &#x25BC </button>
                    </a>
                </th>
                    
                <th>Status
                    <a href="{{ route('sort', 'status')}}">
                        <button class="btn-right"> &#x25BC </button>
                    </a>
                </th>

                <th>Due Date
                    <a href="{{ route('sort', 'due_date')}}">
                        <button class="btn-right"> &#x25BC </button>
                    </a> 
                </th>

                <th>Actions</th>
            </tr>

        @foreach ($tasks as $task)
            <tr>

                {{-- SUMMARY COLUMN --}}
                @if ($task->status == "Completed")
                    <td class="completedTask">
                        {{$task->summary}}
                    </td>
                @else
                    <td>
                        {{$task->summary}}
                    </td>
                @endif

                {{-- STATUS / ChangeStatus COLUMN --}}
                <td>
                    <select onchange="location = this.value;">

                        <option> {{$task->status}} </option>

                        <option value="{{ route('change-status', array( $task->id, 'status' => 'Pending')) }}">
                            Pending 
                        </option>

                        <option value="{{ route('change-status', array( $task->id, 'status' => 'In Progress')) }}">
                            In Progress 
                        </option>

                        <option value="{{ route('change-status', array( $task->id, 'status' => 'Completed')) }}">
                            Completed 
                        </option>

                    </select>
                </td>


                {{-- DATE COLUMN --}}
                <td>
                    <?php echo date('d M Y', strtotime($task->due_date)); ?> 
                </td>

                {{-- BUTTONS COLUMN --}}
                <td> 
                    {{-- edit button --}}
                    <a href="{{route('edit-task', $task->id)}}">
                        <button type="button">  &#9998 </button>
                    </a>

                    {{-- task compleate button --}}
                    <a href="{{ route('change-status', array( $task->id, 'status' => 'Completed')) }}">

                        @if ($task->status != "Completed")
                            <button type="button"> &#10004 </button>
                        @else
                            <button type="button"> &#9989 </button>
                        @endif

                    </a>

                    {{-- delete button --}}
                    <a href="{{route('delete-task', $task->id)}}">
                        <button type="button"> &#10060 </button>
                    </a>
                </td>

            </tr>
        @endforeach

        </table>

        @yield('dialogBox')
     
    </div>        
</body>

</html>
