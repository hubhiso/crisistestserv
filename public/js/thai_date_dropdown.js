/**
 * Created by tonglar on 2/15/2018 AD.
 */
function load_date(mon,year) {
    var output = [];
    if(mon==2){
        if((year%400)==0){
            var x = 29
        }else if((year%100)==0){
            var x = 28
        }else if((year%4)==0){
            var x = 29
        }else{
            var x = 28
        }
    }else if(mon==1 || mon==3 || mon==5 || mon==7 || mon== 8 || mon== 9 || mon== 12){
        var x = 31
    }else{
        var x = 30
    }
    for(i = 1;i<=x;i++) {
        output.push('<option value="' + i + '">' + i + '</option>');
    }
   return output;
}

function date_interview() {

    var mon = $('#MonthInterview').val();
    var year = $('#YearInterview').val()-543;
    var output = load_date(mon,year);
    $('#DayInterview').html(output.join(''));
}
function date_birth() {
    var mon = $('#monthInput').val();
    var year = $('#yearInput').val()-543;
    var output = load_date(mon,year);
    $('#dayInput').html(output.join(''));
}
function date_acc() {
    var mon = $('#MonthAct').val();
    var year = $('#YearAct').val()-543;
    var output = load_date(mon,year);
    $('#DayAct').html(output.join(''));
}
function date_operate() {
    var mon = $('#Monthoperate').val();
    var year = $('#Yearoperate').val()-543;
    var output = load_date(mon,year);
    $('#Dayoperate').html(output.join(''));
}