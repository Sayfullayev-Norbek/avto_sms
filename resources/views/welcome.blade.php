<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send SMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            padding-top: 50px;
        }
        .container {
            max-width: 1200px;
        }
        .card {
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #007BFF;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <!-- Form Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Send SMS</h5>

                        @if(!empty($filails))
                            <label for="filail_id" class="form-label">Filail</label>
                            <select id="filail_id" name="filail_id" class="form-select">
                                @foreach ($filails as $filail)
                                    <option value="{{ $filail['id'] }}">{{ $filail['name'] }}</option>
                                @endforeach
                            </select>
                        @else
                            <p>Sizda Filail yuq!</p>
                        @endif
                        <form action="{{ route('send.sms', ['token' => $token]) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="message" class="form-label">Xabar:</label>
                                <textarea id="message" name="message" rows="4" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="schedule_id" class="form-label">Qachon:</label>
                                        <select id="schedule_id" name="schedule_id_1" class="form-select">
                                            <option value="1">Har kuni</option>
                                            <option value="2">Dars kuni</option>
                                            <option value="3">Darsdan bir kuni oldin</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12 time-label">
                                            <label for="send_time" class="form-label">Vaqt: AM/PM</label>
                                            <input type="time" id="send_time" name="send_time" class="form-control" value="09:00">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="schedule_id_3" class="form-label">Kimga:</label>
                                        <select id="schedule_id_3" name="schedule_id_3" class="form-select">
                                            <option value="Sinovdagilarga">Sinovdagilarga</option>
                                            <option value="Qarizdorlarga">Qarizdorlarga</option>
                                            <option value="Aktivlarga">Aktivlarga</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12 time-label">
                                        <label for="send_day" class="form-label">Kun </label>
                                        <input type="number" id="send_day" name="send_day" class="form-control" value="09:00">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-custom">SMS Yuborish</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Sends Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rejalashtirilgan Xabarlar</h5>
                        @if ($sends->isNotEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Soni</th>
                                        <th>Xabaringiz</th>
                                        <th>Kimga</th>
                                        <th>Kun</th>
                                        <th>Send Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sends as $send)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $send->message }}</td>
                                            <td>{{ $send->schedule_id_3 }}</td>
                                            <td>{{ $send->send_day }}</td>
                                            <td class="border p-1">{{ $send->send_time }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Sizda hali rejalashtirilgan xabar yuq!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
