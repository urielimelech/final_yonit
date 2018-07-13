$(document).ready(function () {
    $.getJSON("data/carsData.json", function (data) {
        $.each(data.Products, function() {
            $("#addCarsMain").append('<section class="addCarBoxes" id=' + this.carNumber + '> <img src=' + this.carLogoUrl + '> <article class="needFont">' + this.carOwner + "'s " + this.carModel +'</article> </section>');
            owner.push(this.carOwner);
        })
    })
})