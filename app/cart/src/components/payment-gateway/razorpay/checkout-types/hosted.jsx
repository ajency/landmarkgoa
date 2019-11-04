import React, {Component} from 'react'
import $ from 'jquery'
class Hosted extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div>
                <form method="POST" action="https://api.razorpay.com/v1/checkout/embedded" ref={this.props.payForm}>
                <input type="hidden" name="key_id" value='rzp_test_k5UaQj4CYdBzL5' />1
                <input type="hidden" id="order_id" name="order_id" value =''/>
                <input type="hidden" name="name" value="Acme Corp"/>
                <input type="hidden" name="description" value="A Wild Sheep Chase"/>
                <input type="hidden" name="image" value="https://cdn.razorpay.com/logos/BUVwvgaqVByGp2_large.png"/>
                <input type="hidden" name="name" value="Acme Corp"/>
                <input type="hidden" name="prefill[name]" value="Gaurav Kumar"/>
                <input type="hidden" name="prefill[contact]" value="9123456780"/>
                <input type="hidden" name="prefill[email]" value="gaurav.kumar@example.com"/>
                <input type="hidden" name="notes[shipping address]" value="L-16, The Business Centre, 61 Wellfield Road, New Delhi - 110001"/>
                <input type="hidden" name="callback_url" value="http://localhost/index.php/payment-successful/"/>
                <input type="hidden" name="cancel_url" value="http://greengrainbowl.local"/>
                <button onClick={(e)=> { this.handleSubmit(e)}}>Pay</button>
                </form>  
            </div>
        );
    }

    async handleSubmit(e) {
        e.preventDefault();
        await this.props.createOrder()
        $('#order_id').val(this.props.r_order_id)
        this.props.payForm.current.submit()
    }
}

export default Hosted
