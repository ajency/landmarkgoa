const fs = require('fs-extra');

let react_file_hash = {};
let react_css_file_hash = {}
let js_files = ["runtime-main.", "main.", "2."];
let css_files = ["main."];

let react_component_file_hash = {};
let react_component_js_files = ["add-to-cart.", "delivery-address-slider.", "sign-in.", "verify-otp.", "view-cart.", "variant-selection-popup"];

fs.emptyDir('../pre_build/cart')
.then(() => {
	fs.copy('./build/', '../pre_build/cart/')
		.then((success) =>{
			console.log("build folder copied successfully");
			for(let i = 0; i<js_files.length; i++){
			    fromDir('./build/static/js/', js_files[i], 'js');
			}

			fromDir('./build/static/css/', css_files[0], 'css');

			console.log("file hash ==>", react_file_hash, react_css_file_hash);


			for(let i = 0; i<react_component_js_files.length; i++){
			    fromDir('../pre_build/', react_component_js_files[i], 'js');
			}

			fs.copy('../pre_build/' , '../build/').then((success)=>{
				fs.writeJson('../build/react_component_file_hash.json', react_file_hash)
				.then(() => {
				  console.log('success!')
				})
				.catch(err => {
				  console.error(err)
				})

				fs.writeJson('../build/cart_app_css_file_hash.json', react_css_file_hash)
				.then(() => {
				  console.log('success!')
				})
				.catch(err => {
				  console.error(err)
				})	
			})
			.catch((error)=>{
				console.log("error in copying pre build folder to build folder ==>", error)
			})

			

		})
		.catch((error)=>{
			console.log("error in copying build folder");
		})
})
.catch(err => {
  console.error(err)
})



function fromDir(startPath,filter, type){
    if (!fs.existsSync(startPath)){
        console.log("no dir ",startPath);
        return;
    }
    console.log("type ==>", type);

    var files=fs.readdirSync(startPath);
    if(type == 'js'){
    	for(var i=0;i<files.length;i++){
	        if (files[i].indexOf(filter)>=0) {
	            console.log('-- found: ',files[i]);
	            react_file_hash[files[i].split('.')[0]] = files[i].split('.')[1];
	        };
	    };
    }
    else {
    	for(var i=0;i<files.length;i++){
	        if (files[i].indexOf(filter)>=0) {
	            console.log('-- found: ',files[i]);
	            react_css_file_hash[files[i].split('.')[0]] = files[i].split('.')[1];
	        };
	    };
    }
};