let razorPayConfig = {
    api_key:'rzp_test_FSfmJofoQNnVG6',
    customJs:"https://checkout.razorpay.com/v1/razorpay.js",
    standardJs:"https://checkout.razorpay.com/v1/checkout.js",
    image:"https://i.imgur.com/n5tjHFD.png",
    // callback_url:"http://greengrainbowl-com.digitaldwarve.staging.wpengine.com/#/order-summary",
    callback_url:"http://greengrainbowl.com/#/order-summary",
    cancel_url:"http://greengrainbowl.com/#/order-summary"
    // cancel_url:"http://greengrainbowl-com.digitaldwarve.staging.wpengine.com/#/order-summary"
};

let payU = {
    api_key:"rzp_test_k5UaQj4CYdBzL5"
};

let generalConfig = {
    apiEndPoint : 'http://localhost:5000/project-ggb/asia-east-2/api/rest/v1',
	// apiEndPoint : 'https://us-central1-project-ggb-dev.cloudfunctions.net/api/rest/v1',
    // apiEndPoint:'https://asia-east2-project-ggb.cloudfunctions.net/api/rest/v1',
    //webSiteLink:"http://greengrainbowl-com.digitaldwarve.staging.wpengine.com/"
    webSiteLink:"https://greengrainbowl.com/",
    company_name:"GGB",
    googleApiKey:'AIzaSyC-w19gW41OaoyjuK4jHPVN5JtviKGB7KQ'
    
}

export {
    razorPayConfig,
    payU,
    generalConfig
}