let razorPayConfig = {
    api_key:"rzp_test_k5UaQj4CYdBzL5",
    customJs:"https://checkout.razorpay.com/v1/razorpay.js",
    standardJs:"https://checkout.razorpay.com/v1/checkout.js",
    image:"https://i.imgur.com/n5tjHFD.png",
    callback_url:"http://greengrainbowl.local/index.php/payment-successful/",
    cancel_url:"http://greengrainbowl.local/index.php/payment-unsuccessful/"
};

let payU = {
    api_key:"rzp_test_k5UaQj4CYdBzL5"
};

let generalConfig = {
    apiEndPoint:'http://localhost:5000/project-ggb-dev/us-central1/api/rest/v1',
    company_name:"GGB"
}

export {
    razorPayConfig,
    payU,
    generalConfig
}