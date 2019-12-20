<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Adm No.</th>
            <th scope="col">DOB</th>
            <th scope="col">Father Name</th>
            <th scope="col">Mother Name</th>
            <th scope="col">Class</th>
            <th scope="col">Section</th>
            <th scope="col">Telephone</th>
            <th scope="col">Documents Verified</th>
            <th scope="col">Gender</th>
            <th scope="col">Caste</th>
            <th scope="col">Religion</th>
        </tr>
    </thead>
    <tbody>

        @php
        $i = 1
        @endphp

        @foreach($results as $result)

        <tr>
            <td>{{$i++}}</td>
            <td>{{$result->name}}</td>
            <td>{{$result->adm_no}}</td>
            <td>{{$result->dob}}</td>
            <td>{{$result->father}}</td>
            <td>{{$result->mother}}</td>
            <td>{{$result->class == 100 ? 'Pre Primary-1' : $result->class}}</td>
            <td>{{$result->section}}</td>
            <td>{{$result->tel1}}</td>
            <td>{{$result->document_verified == 1 ? 'Verified' : 'Not Verfied'}}</td>
            <td>{{$result->gender == 0 ? 'Male' : 'Female'}}</td>
            <td>
                @if($result->cast_category == 1)General @endif
                @if($result->cast_category == 2)SC @endif
                @if($result->cast_category == 3)OB @endif
                @if($result->cast_category == 4)ST @endif
            </td>
            <td>
                @if($result->religion == 1)Hindu @endif
                @if($result->religion == 2)Sikh @endif
                @if($result->religion == 3)Jain @endif
                @if($result->religion == 4)Muslim @endif
                @if($result->religion == 5)Christian @endif
                @if($result->religion == 6)Other @endif
            </td>

        </tr>

        @endforeach
    </tbody>
</table>