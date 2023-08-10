<div class="container-fluid">
    <div class="row">

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100 bg-white">
                <div class="p-3">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <h4 id="netIncome" class="mb-0 text-capitalize font-weight-bold">01</h4>
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100 bg-white">
                <div class="p-3">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <h4 id="income" class="mb-0 text-capitalize font-weight-bold">01</h4>
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100 bg-white">
                <div class="p-3">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <h4 id="expense" class="mb-0 text-capitalize font-weight-bold">01</h4>
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    netIncome();
   async function netIncome() {
        showLoader();
        let res = await axios.get('/netIncome');
        hideLoader();
        document.getElementById('netIncome').textContent = `Net Income: ${res.data['netIncome']} BDT`;
        document.getElementById('income').textContent = `Total Income: ${res.data['totalIncome']} BDT`;
        document.getElementById('expense').textContent = `Total Expense: ${res.data['totalExpense']} BDT`;
    }
    
</script>
