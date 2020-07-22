const fs = require('fs');
let jsonData = require('./env.json');

let envArr = ["add-to-cart", "cart", "delivery-address-slider", "firebase", "verify-otp", "view-cart"];

for (var f = 0; f < envArr.length; f++) {
	let folder = envArr[f];

	let data = "";
	if(jsonData[folder].type == 'json'){
		data = JSON.stringify(jsonData[folder].content);
	} else {
		let content = jsonData[folder].content;
		for (var c = 0; c < content.length; c++) {
			data += content[c].key + " = " + content[c].value + "\r\n";
		}
	}
	
	fs.writeFile("./"+folder+"/"+((jsonData[folder].type == 'env') ? '.env' : 'env.json'), data, function(err) {
        if(err) {
            return console.log(err);
        }
    });
}

fs.writeFile("./cart/build_location.json", '{"location":"' + jsonData['build_location'] + '"}', function(err) {
    if(err) {
        return console.log(err);
    }
});