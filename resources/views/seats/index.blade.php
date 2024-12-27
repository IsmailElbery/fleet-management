<!-- resources/views/seats/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Seats</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Book a Trip</h2>

        @include('layout.alert')

        <form method="POST" action="{{ route('seats.search') }}">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label for="trip_id" class="form-label">Select Trip</label>
                    <select name="trip_id" id="trip_id" class="form-select" required>
                        <option value="" disabled selected>Select a Trip</option>
                        @foreach($trips as $trip)
                            <option value="{{ $trip->id }}">{{ $trip->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="start_station_id" class="form-label">Start Station</label>
                    <select name="start_station_id" id="start_station_id" class="form-select" required>
                        <option value="" disabled selected>Select Start Station</option>
                        @foreach($stations as $station)
                            <option value="{{ $station->id }}">{{ $station->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="end_station_id" class="form-label">End Station</label>
                    <select name="end_station_id" id="end_station_id" class="form-select" required>
                        <option value="" disabled selected>Select End Station</option>
                        @foreach($stations as $station)
                            <option value="{{ $station->id }}">{{ $station->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn btn-primary w-100">Find Seats</button>
                </div>
            </div>
        </form>


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const startStationDropdown = document.getElementById('start_station_id');
            const endStationDropdown = document.getElementById('end_station_id');

            startStationDropdown.addEventListener('change', function () {
                const selectedStartStation = this.value;

                // Enable all options in the end station dropdown
                Array.from(endStationDropdown.options).forEach(option => {
                    option.disabled = false;
                });

                // Disable the selected start station in the end station dropdown
                if (selectedStartStation) {
                    Array.from(endStationDropdown.options).forEach(option => {
                        if (option.value === selectedStartStation) {
                            option.disabled = true;
                        }
                    });
                }

                // Reset the end station dropdown if the selected option is now disabled
                if (endStationDropdown.value === selectedStartStation) {
                    endStationDropdown.value = '';
                }
            });
        });
    </script>
</body>
</html>
