$(document).ready(function () {


    //get districts
    var regionSelect = $("#book-region_id");
    var districtSelect = $("#book-district_id");
    var sectorSelect = $("#book-sector_id");

    regionSelect.change(function () {
        var regionId = regionSelect.val();
        var url = "../reference/ref-district/district";
        getDistricts(url, regionId, districtSelect);
    });
    //get sectors

    districtSelect.change(function () {
            var districtId = districtSelect.val();
            var url = "../reference/ref-sector/sector";
            getDistricts(url, districtId, sectorSelect)
        }
    );


    function getDistricts(path, id, element) {
        $.ajax({
            type: "GET",
            url: path,
            data: {id: id},
            success: function (data) {
                $(element).html("");
                var results = JSON.parse(data);
                results.forEach(function (item) {
                    element.append('<option value=' + item.id + '>' + item.name + '</option>')
                });
            }
        });
    }


});



