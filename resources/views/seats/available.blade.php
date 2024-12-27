<!-- resources/views/seats/available.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Seats</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Available Seats</h2>

        @if ($availableSeats->isEmpty())
            <div class="alert alert-warning text-center">No available seats for the selected stations.</div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Seat Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($availableSeats as $seat)
                        <tr>
                            <td>{{ $seat->seat_number }}</td>
                            <td>
                                <form method="POST" action="{{ route('seats.book') }}">
                                    @csrf
                                    <input type="hidden" name="seat_number" value="{{ $seat->seat_number }}">
                                    <input type="hidden" name="start_station_id" value="{{ $startStationId }}">
                                    <input type="hidden" name="end_station_id" value="{{ $endStationId }}">
                                    <input type="hidden" name="trip_id" value="{{ $trip_id }}">

                                    <button type="submit" class="btn btn-success">Book</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('seats.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
</body>
</html>
