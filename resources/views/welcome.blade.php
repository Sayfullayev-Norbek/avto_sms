<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send </title>
</head>
<body>

    <form action="{{ route('send.sms') }}" method="POST">
        @csrf
        <label for="params">SMS yuborish vaqti:</label>
        <input type="text" id="params" name="params">
        <br><br>
        <label for="message">Xabar:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea>
        <br><br>
        <select class="form-control" name="schedule_id">
            @if (!empty($schedules))
                @foreach($schedules as $sched)
                    <option value="{{ $sched['id'] }}">{{ $sched['name'] }}</option>
                @endforeach
            @else
                <option disabled selected>Sizda Filial yuq!</option>
            @endif
        </select>
        <button type="submit">SMS Yuborish</button>
    </form>

</body>
</html>
