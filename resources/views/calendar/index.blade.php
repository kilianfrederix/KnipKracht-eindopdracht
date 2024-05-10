<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('styles/calender.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <section class="main-header">
        <img src="#" alt="Logo">
        <nav class="header-nav">
            <a class="header-link" href="{{ route('home') }}">Home</a>
            <a class="header-link" href="{{ route('about') }}">About us</a>
            <a class="header-link" href="{{ route('contact') }}">Contact</a>
            <a class="header-link" href="{{ route('login.get') }}">Login</a>
            @auth
                <a class="header-link" href="{{ route('logout') }}">Logout</a>
                @if (Auth::user()->is_employee)
                    <a class="header-link" href="{{ route('employee.dashboard') }}">Dashboard</a>
                @endif
            @endauth
            <a class="afspraak-maken-btn" href="{{ route('calendar.index') }}">Maak een afspraak</a>
        </nav>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nieuw Evenement Toevoegen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kapper" class="form-label">Kapper</label>
                        <span id="kapperError" class="text-danger"></span>
                        <select class="form-select" id="kapper">
                            <option value="">Selecteer een kapper</option>
                            @foreach($kappers as $kapper)
                                <option value="{{ $kapper->id }}">{{ $kapper->naam }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dienst" class="form-label">Dienst</label>
                        <span id="dienstError" class="text-danger"></span>
                        <select class="form-select" id="dienst">
                            <option value="">Selecteer een dienst</option>
                            @foreach($diensten as $dienst)
                                <option value="{{ $dienst->id }}">{{ $dienst->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">note</label>
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
    <div class="container">
        <div class="row">
            <div class="col-2 mt-5 flex">
                <div class="info-callender">
                    <div class="color-codes-info">
                        <div class="color-box Knippen-Dames"></div>
                        <div class="text-box">
                            <p class="info-text">Knippen / Dames</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box Knippen-Heren"></div>
                        <div class="text-box">
                            <p class="info-text">Knippen / Heren</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box wassen-Knippen-drogen-dames"></div>
                        <div class="text-box">
                            <p class="info-text">Wassen Knippen drogen / Dames</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box wassen-Knippen-drogen-Heren"></div>
                        <div class="text-box">
                            <p class="info-text">Wassen Knippen drogen / Heren</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box scheren"></div>
                        <div class="text-box">
                            <p class="info-text">scheren / Heren</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box trimmen"></div>
                        <div class="text-box">
                            <p class="info-text">trimmen / Heren</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box kleuren"></div>
                        <div class="text-box">
                            <p class="info-text">kleuren / Heren</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box basis-kleuren"></div>
                        <div class="text-box">
                            <p class="info-text">Basis kleuren / Dames</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box kort-Haar-Kleuren"></div>
                        <div class="text-box">
                            <p class="info-text">Kort Haar Kleuren / Dames</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box Half-Lang-Haar-Kleuren"></div>
                        <div class="text-box">
                            <p class="info-text">Half Lang Haar Kleuren / Dames</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box Lang-Haar-Kleuren"></div>
                        <div class="text-box">
                            <p class="info-text">Lang Haar Kleuren / Dames</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box Bruidskapsel"></div>
                        <div class="text-box">
                            <p class="info-text">Bruidskapsel / Dames</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box HoofdMassage-dames"></div>
                        <div class="text-box">
                            <p class="info-text">HoofdMassage / Dames</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box HoofdMassage-heren"></div>
                        <div class="text-box">
                            <p class="info-text">HoofdMassage / Heren</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box permanent"></div>
                        <div class="text-box">
                            <p class="info-text">permanent / Heren</p>
                        </div>
                    </div>
                    <div class="color-codes-info">
                        <div class="color-box krullen"></div>
                        <div class="text-box">
                            <p class="info-text">krullen / Dames</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 d-flex align-items-center flex-column">
                <h2 class="text-center mt-5">FullCalender</h2>
                <div class="col-md-11 mb-5 d-flex align-items-center flex-column">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
    <footer class="main-footer">
        <div class="footer-content">
            <h1>test</h1>
            @auth
                <p>Welcome {{ Auth::user()->username }} {{ Auth::user()->is_employee }}</p>
            @endauth
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
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
                select: function(start, end, allDays) {
                    $('#bookingModal').modal('toggle');

                    $('#saveBtn').click(function() {
                        let title = $('#title').val();
                        let start_date = moment(start).format('YYYY-MM-DD HH:mm:ss');
                        let end_date = moment(end).format('YYYY-MM-DD HH:mm:ss');
                        let kapper_id = $('#kapper').val(); // ID van de geselecteerde kapper
                        let dienst_id = $('#dienst').val(); // ID van de geselecteerde dienst

                        $.ajax({
                            url: "{{ route('calendar.store') }}?_=" + Date.now(),
                            type:"POST",
                            dataType:'json',
                            data: { title, start_date, end_date, kapper_id, dienst_id }, // Voeg kapper_id en dienst_id toe
                            success:function(response)
                            {
                                swal("Good job!", "Event added!", "success");
                                $('#bookingModal').modal('hide')
                                $('#calendar').fullCalendar('renderEvent', {
                                    'id': response.id,
                                    'title': response.title,
                                    'start': response.start,
                                    'end': response.end,
                                    'color': response.color, // Gebruik de kleur van de dienst
                                });
                            },
                            error:function(error)
                            {
                                if(error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors.title);
                                }
                                if(error.responseJSON.errors) {
                                    $('#kapperError').html(error.responseJSON.errors.kapper_id);
                                }
                                if(error.responseJSON.errors) {
                                    $('#dienstError').html(error.responseJSON.errors.dienst_id);
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
                    $.ajax({
                        url:"{{ route('calendar.update', '') }}" +'/'+ id,
                        type:"PATCH",
                        dataType:'json',
                        data: { start_date, end_date },
                        success:function(response)
                        {
                            swal("Good job!", "Event Updated!", "success");
                        },
                        error:function(error)
                        {
                            console.log(error)
                        }
                    });
                },

                eventClick: function(event) {
                    let id = event.id;
                    if(confirm('are you sure you want to remove it')) {
                        $.ajax({
                            url:"{{ route('calendar.destroy', '') }}" +'/'+ id,
                            type:"DELETE",
                            dataType:'json',
                            success:function(response)
                            {
                                $('#calendar').fullCalendar('removeEvents', response);
                                swal("Good job!", "Event Deleted!", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            }
                        });
                    }
                },
                selectAllow: function(event)
                {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                },
            });
            $("#bookingModal").on("hidden.bs.modal", function () {
                $('#saveBtn').unbind();
            });
        });
    </script>
</body>
</html>
