<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="./agron/img/apple-icon.png"> --}}
    <link rel="icon" type="image/png" href="{{ URL::asset('/images/favicon.ico') }}">
    <link href="/css/print.css" rel="stylesheet" media="print" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ $title }} | {{ $page }}
    </title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ URL::asset('/agron/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('/agron/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/solid.min.css"
        integrity="sha512-qzgHTQ60z8RJitD5a28/c47in6WlHGuyRvMusdnuWWBB6fZ0DWG/KyfchGSBlLVeqAz+1LzNq+gGZkCSHnSd3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link href="{{ URL::asset('/agron/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ URL::asset('/agron/css/argon-dashboard.css?v=2.0.2') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"> --}}
    <!-- ChartJs -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

<body class="g-sidenav-show bg-gray-200">
    <div class="min-height-100 bg-success position-absolute w-100"></div>

    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl mt-3 mb-4 fixed-start ms-4  shadow-lg"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="/" target="_blank">
                <img src="{{ asset('images/harvest_logo.png') }}" class="navbar-brand-img" alt="main_logo">
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-100 h-auto ps ps--active-y" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Acceuil</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/Recolte">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-books text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Récolte</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/Export">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-delivery-fast text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Export</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/Dechet">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-archive-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dechet</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="/Chiffre-d-Affaires">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Chiffre d'affaires</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/Statistique">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-chart-bar-32 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Statistique</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/Parcelle">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-building text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Parcelle</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/Culture">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-basket text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Culture</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="/Client">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-book-bookmark text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Client</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Paramètres de compte</h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="/Profile">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="/Utilisateur">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-badge text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Utilisateurs</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-button-power text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Déconnexion</span>
                    </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </aside>

    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-3" id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $page }}
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">{{ $page }}</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="ms-md-auto navbar-nav justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">
                                    {{ $users->nom }} {{ $users->prenom }}
                                </span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="/Profile" class="nav-link text-white p-0">
                                <i class="fa fa-cog cursor-pointer"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid py-4 w-100">
            <!--------------------------------------- Messages ---------------------------------------------->
            @include('messages.message')

            <!--------------------------------------- Body ---------------------------------------------->
            @yield('content')
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('/agron/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/agron/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/agron/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/agron/js/plugins/smooth-scrollbar.min.js') }}"></script>
    {{-- <script src="{{ asset('/agron/js/plugins/chartjs.min.js') }}"></script> --}}
    {{-- <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script> --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('/agron/js/argon-dashboard.min.js?v=2.0.2') }}"></script>




    <script type="text/javascript">
        $('.chkbox').click(function() {
            var $ico = $(this).next().find('i');
            $ico.toggleClass('bi-plus-circle-fill bi-dash-circle-fill');
        });
        $('.openach').click(function() {
            var $ico = $(this).next().find('i');
            $ico.toggleClass('bi-plus-circle-fill bi-dash-circle-fill');
        });

        $('.clear').click(function() {
            $('.inputfield').val('');
            $('.select_option').prop('selectedIndex', 0);
            $('.input_date').val(new Date());
            $(".input_radio").prop("checked", false);
        });


        // Add domaine
        function addDomaine() {
            optionText = $("#new_domaine").val();
            optionValue = $("#new_domaine").val();
            $('#select_domaine').append(new Option(optionText, optionValue));
            $('#new_domaine').val('');
            $("#select_domaine").val(optionValue).change();
        }

        // Add Ferme
        function addFerme() {
            optionText = $("#new_ferme").val();
            optionValue = $("#new_ferme").val();
            $('#select_ferme').append(new Option(optionText, optionValue));
            $('#new_ferme').val('');
            $("#select_ferme").val(optionValue).change();

        }

        // PASS FERME
        $('select[name=ferme]').on('change', function() {
            var select1 = $(this).find('option:selected').val()
            $("#new_parcelle").val(select1)
        });

        $('select[name=select_culture]').on('change', function() {
            var select1 = $(this).find('option:selected').val()
            $('select[name=select_variete]').on('change', function() {
                var select2 = $(this).find('option:selected').val()
                $("#produitInput").val(select1 + ' ' + select2)
            });
        });

        // Add Parcelle
        function addParcelle() {
            optionText = $("#new_parcelle").val();
            optionValue = $("#new_parcelle").val();
            $('#select_parcelle').append(new Option(optionText, optionValue));
            $('#new_parcelle').val('');
            $("#select_parcelle").val(optionValue).change();
        }

        // Add PorteGreffe
        function addPorteGreffe() {
            optionText = $("#new_porte_greffe").val();
            optionValue = $("#new_porte_greffe").val();
            $('#select_porte_greffe').append(new Option(optionText, optionValue));
            $('#new_porte_greffe').val('');
            $("#select_porte_greffe").val(optionValue).change();
        }
        // Add Variete
        function addVariete() {
            optionText = $("#new_variete").val();
            optionValue = $("#new_variete").val();
            $('#select_variete').append(new Option(optionText, optionValue));
            $('#new_variete').val('');
            $("#select_variete").val(optionValue).change();
        }

        // Add Unite
        function addUnite() {
            optionValue1 = $("#new_unite").val();
            optionValue2 = $("#new_conteneur").val();
            $('#select_unite').append(new Option(optionValue1, optionValue1));
            $('#select_conteneur').append(new Option(optionValue2, optionValue2));
            $('#new_unite').val('');
            $('#new_conteneur').val('');
            $("#select_unite").val(optionValue1).change();
            $("#select_conteneur").val(optionValue2).change();
        }
    </script>

    {{-- On change input --}}
    <script>
        $(document).ready(function() {
            $(".inputfield").keyup(function() {
                var val1 = +$("#caisse_total").val();
                var val2 = +$("#caisse_dechet").val();
                $("#caisse_export").val(val1 - val2);
            });
        });

        $(document).ready(function() {
            $(".editRecolteBtn").click(function() {
                var id = $(this).data('id');
                $(".inputfield").keyup(function() {
                    var val1 = +$("#edit_caisse_net" + id).val();
                    var val2 = +$("#edit_caisse_dechet" + id).val();
                    var val3 = +parseFloat($("#edit_select_unite" + id + " :selected").val());

                    $("#edit_caisse_export" + id).val(val1 - val2);

                    $("#edit_poids_net" + id).val(val1 * val3);
                    $("#edit_poids_dechet" + id).val(val2 * val3);

                    var val4 = +$("#edit_caisse_export" + id).val();
                    $("#edit_poids_export" + id).val(val4 * val3);
                });
            });
        });

        $(document).ready(function() {
            $(".editRecord").click(function() {
                var id = $(this).data('id');
                $(".edit_field").keyup(function() {
                    var val1 = +$("#edit_poids_export" + id).val();
                    var val2 = +$("#edit_prix_export" + id).val();
                    $("#prix_total_export" + id).val(val1 * val2);


                    var val3 = +$("#edit_poids_dechet" + id).val();
                    var val4 = +$("#edit_prix_dechet" + id).val();
                    $("#prix_total_dechet" + id).val(val3 * val4);

                });
            });
        });
    </script>

    <!-- Table Filter JAVASCRIPT -->
    <script>
        $(document).ready(function() {
            $(".search").keyup(function() {
                var searchTerm = $(".search").val();
                var listItem = $('.results tbody').children('tr');
                var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

                $.extend($.expr[':'], {
                    'containsi': function(elem, i, match, array) {
                        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf(
                            (match[3] || "").toLowerCase()) >= 0;
                    }
                });

                $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e) {
                    $(this).attr('visible', 'false');
                });

                $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e) {
                    $(this).attr('visible', 'true');
                });

                var jobCount = $('.results tbody tr[visible="true"]').length;
                $('.counter').text(jobCount + ' resultat');

                if (jobCount == '0') {
                    $('.no-result').show();
                } else {
                    $('.no-result').hide();
                }
            });
        });
    </script>

    <!-- ChartJs JAVASCRIPT -->
    <script>
        // Data retrieved from http://vikjavev.no/ver/index.php?spenn=2d&sluttid=16.06.2015.

        Highcharts.chart('container', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'spline',
                scrollablePlotArea: {
                    minWidth: 600,
                    scrollPositionX: 1
                }
            },
            title: {
                text: 'Statistiques de récolte pendant la semaine',
                align: 'left'
            },
            subtitle: {
                text: '30 mai au 06 juin 2022 dans toutes les parcelles de Green Solutions',
                align: 'left'
            },
            xAxis: {
                type: 'datetime',
                labels: {
                    overflow: 'justify'
                }
            },
            yAxis: {
                title: {
                    text: 'Poids (kg)'
                },
                minorGridLineWidth: 0,
                gridLineWidth: 0,
                alternateGridColor: null,
            },
            tooltip: {
                valueSuffix: ' kg'
            },
            plotOptions: {
                spline: {
                    lineWidth: 6,
                    states: {
                        hover: {
                            lineWidth: 5
                        }
                    },
                    marker: {
                        enabled: false
                    },
                    pointInterval: 3600000 * 24, // one hour
                    pointStart: Date.UTC(2022, 5, 23)
                }
            },
            series: [{
                name: 'Export',
                data: [
                    70365, 80647, 92330, 105000, 100021, 123547, 100145, 80249, 90222, 130000, 105000,
                    100021, 123547, 100145, 123547,
                ]

            }, {
                name: 'Dechet',
                data: [
                    10254, 6530, 500, 6547, 1534, 1254, 21457, 15947, 10245, 1547, 2021, 4213, 23054,
                    20054, 21054,
                ]
            }],
            navigation: {
                menuItemStyle: {
                    fontSize: '10px'
                }
            }
        });
    </script>

    <!-- Radio Switch JAVASCRIPT -->
    <script>
        (function(window, document) {
            'use strict';
            var slice = [].slice;
            var removeClass = function(elem) {
                elem.classList.remove('focus-within');
            };
            var update = (function() {
                var running, last;
                var action = function() {
                    var element = document.activeElement;
                    running = false;
                    if (last !== element) {
                        last = element;
                        slice.call(document.getElementsByClassName('focus-within')).forEach(removeClass);
                        while (element && element.classList) {
                            element.classList.add('focus-within');
                            element = element.parentNode;
                        }
                    }
                };
                return function() {
                    if (!running) {
                        requestAnimationFrame(action);
                        running = true;
                    }
                };
            })();
            document.addEventListener('focus', update, true);
            document.addEventListener('blur', update, true);
            update();
        })(window, document);

        $(document).ready(function() {
            if ($('input:checkbox').is(':visible')) {
                $("#checkAll").click(function() {
                    $('input:checkbox').not(this).prop('checked', this.checked);
                });
            }
        })

        $(document).ready(function() {

            var sum_poids = 0;
            var sum_prix = 0;
            $(this).find('.poids_t').each(function() {
                var poids = $(this).text();
                if (!isNaN(poids) && poids.length !== 0) {
                    sum_poids += parseFloat(poids);
                }
            })
            $(this).find('.prix_t').each(function() {
                var prix = $(this).text();
                if (!isNaN(prix) && prix.length !== 0) {
                    sum_prix += parseFloat(prix);
                }
            })
            $("#prix_total_glbl").text(sum_prix.toFixed(2));
            $("#poids_total_glbl").text(sum_poids.toFixed(2));
        })

        // function calculateTotalTreatedVolume() {
        //     var grandTotal = 0;
        //     $("table.results").find('input[name^="prix_total_tbl"]').each(function() {
        //         if ($("table.results").find('input[name^="export_id"]').is(':checked')) {

        //         }
        //     })
        //     $("#prix_total_glbl").text(grandTotal.toFixed(2));
        // }
    </script>

    {{-- <script type="text/javascript">
        function showTime() {
            var date = new Date(),
                utc = new Date(Date.UTC(
                    date.getFullYear(),
                    date.getMonth(),
                    date.getDate(),
                    date.getHours().add(2, 'hours').format('hh:mm A'),
                    date.getMinutes(),
                    date.getSeconds()
                ));

            document.getElementById('time').innerHTML = utc.toLocaleTimeString();
        }

        setInterval(showTime, 1000);
    </script> --}}

    {{-- <script>
        $('.nav-link').click(function(event) {
            // Avoid the link click from loading a new page
            event.preventDefault();

            // Load the content from the link's href attribute
            $('.content').load($(this).attr('href'));
        });
    </script> --}}
</body>

</html>
