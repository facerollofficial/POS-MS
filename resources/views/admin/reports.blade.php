@extends('masterlayout.adminlayout')

@section('location')
    REPORTS
@endsection


@section('content')

    <div class="container" style="margin-top: 10px;width: 50rem">


        <div class="card text-white mb-3 blue-bg">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <ul class="nav nav-pills flex-column">
                            <h2>
                                <li class="yellow">
                                    <i class="fas fa-file-alt yellow" style="margin-right: 1rem"></i>
                                    REPORT GENERATOR
                                </li>
                            </h2>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="container">
                        <div class="row" style="text-align: center">
                            <div class="col">
                                <fieldset class="form-group">
                                    <legend class="mt-4">Date Range</legend>
                                    <div class="form-check">

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="ReportsRadio"
                                                    id="DailyRadio" value="DailyRadio" checked>
                                                Daily
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="ReportsRadio"
                                                    id="MonthlyRadio" value="MonthlyRadio">
                                                Monthly
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="ReportsRadio"
                                                    id="AnnualRadio" value="AnnualRadio">
                                                Annual
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="ReportsRadio"
                                                    id="CustomRadio" value="CustomRadio">
                                                Custom
                                            </label>
                                        </div>

                                    </div>
                                </fieldset>
                            </div>
                        </div>


                        <hr>
                        <div class="row" style="text-align: center" id="customDateDiv">
                            <h5 class="yellow">Custom Date</h5>
                            <div class="col">

                                <div class="row">
                                    <div class="form-group">
                                        <label class="form-label mt-4 yellow">Start Date</label>
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" placeholder="Date"
                                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                                    id="startDate">
                                                <!--<button class="btn btn-yellow" type="button" id="button-addon2"><i class="fas fa-calendar-alt fa-lg"></i></button>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="form-label mt-4 yellow">End Date</label>
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" placeholder="Date"
                                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                                    id="endDate">
                                                {{-- <button class="btn btn-yellow" type="button" id="button-addon2"><i class="fas fa-calendar-alt fa-lg"></i></button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="form-label mt-4 yellow">Filters</label>
                    <div class="card border-secondary mb-3">
                        <div class="card-body gray">
                            <div class="row">

                                <div class="col">
                                    <h6 style="text-align: center">Category</h6>

                                    <div class="form-check">
                                        <input class="form-check-input allCheck" type="checkbox" value="allCheck"
                                            id="allCheck" name="Category">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            All
                                        </label>
                                    </div>

                                    <hr>

                                    @foreach ($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input {{ $category->CategoryID }}" type="checkbox"
                                                value="{{ $category->CategoryID }}" id="{{ $category->CategoryID }}"
                                                name="Category">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{ $category->CategoryName }}
                                            </label>
                                        </div>

                                    @endforeach
                                    </fieldset>



                                </div>



                                <div class="col">
                                    <h6 style="text-align: center">Salesperson</h6>

                                    <fieldset class="form-group">
                                        <div class="form-group">
                                            <select class="form-select" id="exampleSelect1">
                                                <option>Any</option>
                                                @foreach ($salespersons as $salesperson)
                                                    <option>{{ $salesperson->FirstName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </fieldset>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="card-footer" style="text-align: right">
                <button class="btn btn-yellow" type="button" style="width: 10rem;" id="GenerateButton">Generate</button>
            </div>
        </div>







    </div>

    <script>
        $(document).ready(function() {

            //Hide Custom Date Div by Default
            document.getElementById("customDateDiv").hidden = true;
            var customRadio = document.getElementById("CustomRadio");
            var checkedRadio = "DailyRadio";

            //Radio for Reports Time Filter
            $('input[type=radio][name=ReportsRadio]').change(function() {
                if (this.value == 'CustomRadio') {
                    document.getElementById("customDateDiv").hidden = false;
                    checkedRadio = this.value;
                } else if (this.value == 'MonthlyRadio') {
                    document.getElementById("customDateDiv").hidden = true;
                    checkedRadio = this.value;
                } else if (this.value == 'AnnualRadio') {
                    document.getElementById("customDateDiv").hidden = true;
                    checkedRadio = this.value;
                } else if (this.value == 'DailyRadio') {
                    document.getElementById("customDateDiv").hidden = true;
                    checkedRadio = this.value;
                }
            });

            //Check box for Category
            $('input[type=checkbox][name=Category]').change(function() {
                if (this.value == 'allCheck') {
                    var checkboxes = document.querySelectorAll('input[type="checkbox"][name=Category]');
                    for (var checkbox of checkboxes) {
                        checkbox.checked = this.checked;
                    }

                } else {
                    document.getElementById("allCheck").checked = false;
                }
            });

            //Generate Report Button on Click
            $('#GenerateButton').click(function(e) {
                e.preventDefault();

                if (checkedRadio == 'CustomRadio') {
                    alert('assign date values from selectors');
                } else {
                    console.log(checkedRadio);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var data = {
                        'checkedRadio': checkedRadio
                    }
                    $.ajax({
                        type: "GET",
                        url: "reports/generate",
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            window.location.href = '/test'; 
                        }
                    });
                }
            });

            //Time limiter for End Date Input
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();

            if (dd < 10) {
                dd = '0' + dd;
            }

            if (mm < 10) {
                mm = '0' + mm;
            }

            today = yyyy + '-' + mm + '-' + dd;
            document.getElementById("endDate").setAttribute("max",
                today);
            document.getElementById("startDate").setAttribute("max", today);


        });
    </script>

@endsection
