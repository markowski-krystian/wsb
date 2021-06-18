$(document).ready(function() {
    //Definiowanie dni polskich w tablicy
    let days = ["Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota"];
    //Pobranie już zdefiniowanych miesięcy
    let format = new Intl.DateTimeFormat('pl', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
    let myDate = new Date();
    //Wyświetlenie daty
    $("#date").html(days[myDate.getDay()]+ ', ' + format.format(myDate));
    //Definicja godziny
    function time(){
        let now = new Date();
        return now.toLocaleTimeString();
    }
    //Wyświetlenie godziny
    setInterval(function(){
        $("#time").html(time());
    }, 1000);

    //Klucz API
    const API_KEY = 'ec3e7b997ab027b3c24bb0a847364561';
    let ENDPOINT = 'https://api.openweathermap.org/data/2.5/forecast?q='+ $('#input_localization').val() +'&lang=pl&appid=' + API_KEY;
    //Dzienna
    $('#search_button').click(function(){
        $.ajax({
            url:ENDPOINT,
            type:'GET',
            success:function(result){
                $("#weather_result").html('');
                    var n = $(document).height();
                    $('html, body').animate({ scrollTop: n }, 2000);
                $.each(result.list, function(index, value){
                    if (index<=8){
                        let s = value.dt_txt;
                        let d = new Date(s);
                        $('#weather_result').append(`
                        <div class="weather_data">
                            <div class="day"><p>` + d.toLocaleTimeString() + `</p></div>
                            <div class="temperature"><p>` + (value.main.temp - 273.15).toFixed(2) + ` °</p></div>
                            <div class="feels_like"><p> Odczuwalna: ` + (value.main.feels_like - 273.15).toFixed(2) + ` °</p></div>
                            <div class="weather_icon"><p><img src = "http://openweathermap.org/img/wn/` + value.weather[0].icon+`@2x.png" /></p></div>
                            <div class="description"><p>` + value.weather[0].description + `</p></div>
                            <div class="pressure"><p> Ciśnienie: ` + value.main.pressure + ` hPa</p></div>
                            <div class="wind_speed"><p><i class="fas fa-wind"></i> ` + value.wind.speed + ` km/h</p></div>
                            <div class="humidity"><p><i class="fas fa-tint"></i> ` + value.main.humidity + `%</p></div>
                        </div>
                        `)
                    }
                });
            },
            error: function(){
                $("#error").delay(3000).fadeIn(800);
                $("#error_city").text('Nieprawidłowa nazwa miasta!');
                $("#error").delay(3000).fadeOut(800); 
              }
        });
    });
    $('#search_button_monthly').click(function(){
        $.ajax({
            url:ENDPOINT,
            type:'GET',
            success:function(result){
                $("#weather_result").html('');
                    var n = $(document).height();
                    $('html, body').animate({ scrollTop: n }, 2000);
                $.each(result.list, function(index, value){
                    if(index==0 || index==8 || index==16 || index==24 || index==32){
                        let s = value.dt_txt;
                        let d = new Date(s);
                        $('#weather_result').append(`
                        <div class="weather_data">
                            <div class="day"><p>` + d.toLocaleDateString() + `</p></div>
                            <div class="temperature"><p>` + (value.main.temp - 273.15).toFixed(2) + ` °</p></div>
                            <div class="feels_like"><p> Odczuwalna: ` + (value.main.feels_like - 273.15).toFixed(2) + ` °</p></div>
                            <div class="weather_icon"><p><img src = "http://openweathermap.org/img/wn/` + value.weather[0].icon+`@2x.png" /></p></div>
                            <div class="description"><p>` + value.weather[0].description + `</p></div>
                            <div class="pressure"><p> Ciśnienie: ` + value.main.pressure + ` hPa</p></div>
                            <div class="wind_speed"><p><i class="fas fa-wind"></i> ` + value.wind.speed + ` km/h</p></div>
                            <div class="humidity"><p><i class="fas fa-tint"></i> ` + value.main.humidity + `%</p></div>
                        </div>
                        `)
                    }
                });
            },
            error: function(){
                $("#error").delay(3000).fadeIn(800);
                $("#error_city").text('Nieprawidłowa nazwa miasta!');
                $("#error").delay(3000).fadeOut(800); 
              }
        });
    });
});