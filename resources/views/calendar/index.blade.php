<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('styles/calender.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <section class="main-header">
        <nav class="main-navigation">
            <div class="header-grid">
                <div class="nav-content-left">
                    <a class="nav-links @if (Request::is('/')) active @endif"
                        href="{{ route('home') }}">Home</a>
                    <a class="nav-links @if (Request::is('about')) active @endif"
                        href="{{ route('about') }}">About
                        us</a>
                    @auth
                        @if (Auth::user()->is_employee)
                            <a class="nav-links @if (Request::is('employee/dashboard')) active @endif"
                                href="{{ route('employee.dashboard') }}">Dashboard</a>
                        @endif
                    @endauth
                </div>
                <div class="nav-content-middle">
                    <img src="{{ asset('images/Knip-Kracht.png') }}" alt="Logo">
                </div>
                <div class="nav-content-right">
                    <a class="afspraak-maken-btn @if (Request::is('calendar')) active @endif"
                        href="{{ route('calendar.index') }}">Maak een afspraak</a>
                </div>
            </div>
        </nav>
    </section>
    <!-- Modal -->
    <div class="callendar-content">
        <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nieuw Evenement Toevoegen</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="naam" class="form-label">Klant Naam</label>
                            <span id="naamError" class="text-danger"></span>
                            <input type="text" class="form-control" id="naam">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <span id="emailError" class="text-danger"></span>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="nummer" class="form-label">Nummer</label>
                            <span id="nummerError" class="text-danger"></span>
                            <input type="text" class="form-control" id="nummer">
                        </div>
                        <div class="mb-3">
                            <label for="kapper" class="form-label">Kapper</label>
                            <span id="kapperError" class="text-danger"></span>
                            <select class="form-select" id="kapper">
                                <option value="">Selecteer een kapper</option>
                                @foreach ($kappers as $kapper)
                                    <option value="{{ $kapper->id }}">{{ $kapper->naam }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dienst" class="form-label">Dienst</label>
                            <span id="dienstError" class="text-danger"></span>
                            <select class="form-select" id="dienst">
                                <option value="">Selecteer een dienst</option>
                                @foreach ($diensten as $dienst)
                                    <option value="{{ $dienst->id }}">{{ $dienst->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Notitie</label>
                            <span id="titleError" class="text-danger"></span>
                            <input type="text" class="form-control" id="title">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuleren</button>
                        <button type="button" id="saveBtn" class="btn btn-primary">Opslaan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main-content">
            <div class="row">
                <div class="callendar-grid">
                    <div class="col-2 mt-5 flex">
                        <div class="info-callender">
                            @foreach ($diensten as $dienst)
                                <div class="color-codes-info">
                                    <div class="color-box {{ $dienst->name }}"></div>
                                    <div class="text-box">
                                        <p class="info-text">{{ $dienst->name }} / {{ $dienst->geslacht }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-11 d-flex align-items-center justify-center flex-column">
                        <h2 class="text-center mt-5">FullCalender</h2>
                        <div class="col-md-11 mb-5 d-flex align-items-center flex-column">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-grid">
                <div class="footer-content-left">
                    <a class="nav-links @if (Request::is('/')) active @endif"
                        href="{{ route('home') }}">Home</a>
                    <a class="nav-links @if (Request::is('about')) active @endif"
                        href="{{ route('about') }}">About us</a>
                </div>
                <div class="footer-content-middle"></div>
                <div class="footer-content-right">
                    @auth
                        @if (Auth::user()->is_employee)
                            <h2><a class="nav-links-hidden" href="{{ route('logout') }}">Welcome
                                    {{ Auth::user()->username }}
                                </a></h2>
                        @else
                            <h2><a class="nav-links" href="{{ route('login.get') }}">Login</a></h2>
                        @endif

                    @endauth
                    @guest
                        <a class="nav-links" href="{{ route('login.get') }}"><img
                                src="{{ asset('images/Knip-Kracht.png') }}" alt="Logo"></a>
                    @endguest
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let booking = @json($events);

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next, today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay',
                },
                events: booking,
                selectable: true,
                selectHelper: true,
                defaultView: 'agendaWeek',
                timezone: 'local', // Stel de tijdszone in op 'local'
                timeFormat: 'h:mm a', // Gebruik 12-uursklok met AM/PM-notatie
                selectConstraint: {
                    start: '07:00', // Starttijd voor selectiebeperking
                    end: '19:00', // Eindtijd voor selectiebeperking
                },
                select: function(start, end, allDays) {
                    $('#bookingModal').modal('toggle');

                    $('#saveBtn').click(function() {
                        let title = $('#title').val();
                        let start_date = moment(start).format('YYYY-MM-DD HH:mm:ss');
                        let end_date = moment(end).format('YYYY-MM-DD HH:mm:ss');
                        let kapper_id = $('#kapper').val(); // ID van de geselecteerde kapper
                        let dienst_id = $('#dienst').val(); // ID van de geselecteerde dienst
                        let naam = $('#naam').val(); // Klant naam
                        let email = $('#email').val(); // Email
                        let nummer = $('#nummer').val(); // Nummer

                        $.ajax({
                            url: "{{ route('calendar.store') }}?_=" + Date.now(),
                            type: "POST",
                            dataType: 'json',
                            data: {
                                title,
                                start_date,
                                end_date,
                                kapper_id,
                                dienst_id,
                                naam,
                                email,
                                nummer
                            }, // Voeg de extra velden toe
                            success: function(response) {
                                swal("Goed Bezig!", " Je evenement is toegevoegd!", "success");
                                $('#bookingModal').modal('hide')
                                $('#calendar').fullCalendar('renderEvent', {
                                    'id': response.id,
                                    'title': response.title,
                                    'start': response.start,
                                    'end': response.end,
                                    'color': response.color,
                                });
                            },
                            error: function(error) {
                                if (error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors
                                        .title);
                                }
                                if (error.responseJSON.errors) {
                                    $('#kapperError').html(error.responseJSON.errors
                                        .kapper_id);
                                }
                                if (error.responseJSON.errors) {
                                    $('#dienstError').html(error.responseJSON.errors
                                        .dienst_id);
                                }
                                if (error.responseJSON.errors) {
                                    $('#nummerError').html(error.responseJSON.errors
                                        .nummer);
                                }
                                if (error.responseJSON.errors) {
                                    $('#emailError').html(error.responseJSON.errors
                                        .email);
                                }
                                if (error.responseJSON.errors) {
                                    $('#naamError').html(error.responseJSON.errors
                                        .naam);
                                }
                            }
                        });
                    });
                },
                editable: true,
                eventDrop: function(event, delta, revertFunc) {
                    let id = event.id;
                    let start_date = moment(event.start).format('YYYY-MM-DD HH:mm:ss');
                    let end_date = moment(event.end).format('YYYY-MM-DD HH:mm:ss');

                    // Toon een bevestigingsdialoog voordat het evenement wordt bijgewerkt
                    if (confirm('Weet je zeker dat je dit evenement wilt bijwerken?')) {
                        $.ajax({
                            url: "{{ route('calendar.update', '') }}" + '/' + id,
                            type: "PATCH",
                            dataType: 'json',
                            data: {
                                start_date,
                                end_date
                            },
                            success: function(response) {
                                swal("Goed bezig!", "Je evenement is bijgewerkt!", "success");
                            },
                            error: function(error) {
                                console.log(error)
                            }
                        });
                    } else {
                        revertFunc(); // Annuleer de actie als de gebruiker de bevestiging heeft geannuleerd
                    }
                },

                eventClick: function(event) {
                    let id = event.id;
                    if (confirm('Weet je zeker dat je dit evenement wilt verwijderen?')) {
                        $.ajax({
                            url: "{{ route('calendar.destroy', '') }}" + '/' + id,
                            type: "DELETE",
                            dataType: 'json',
                            success: function(response) {
                                $('#calendar').fullCalendar('removeEvents', response);
                                swal("goed Bezig!", "Je evenement is verwijderd!", "success");
                            },
                            error: function(error) {
                                console.log(error)
                            }
                        });
                    }
                },
                selectAllow: function(event) {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1,
                        'second').utcOffset(false), 'day');
                },
            });
            $("#bookingModal").on("hidden.bs.modal", function() {
                $('#saveBtn').unbind();
            });
        });
    </script>
</body>

</html>
