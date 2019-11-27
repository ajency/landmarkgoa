'use strict';
const e = React.createElement;

class viewCart extends React.Component {
	constructor(props) {
		super(props);
		this.state = { 
			apiEndPoint : 'https://asia-east2-project-ggb-dev.cloudfunctions.net/api/rest/v1',
			cart : null,
		};
	}

	componentDidMount(){
		this.fetchCart();
	}

	render() {
			return (
				<div className={(!this.state.cart || !this.state.cart.cart_count ? 'd-none' : '')}>
						{this.getItemsCount()}
					<div id="view-cart-btn" className="cursor-pointer zindex-1" onClick={() => this.loadCart()}>
						VIEW CART
					</div>
				</div>
			);
	}

	getItemsCount(){
		if(this.state.cart && this.state.cart.cart_count){
			return (
				<div className="zindex-1">
					<div className="cart-count d-inline-block d-lg-flex">
						{this.state.cart.cart_count} 
					</div>
					<span className="d-inline-block d-lg-none ml-1">Item(s)</span>
				</div>
			)
		}
	}

	getCartTotal(){
		if(this.state.cart && this.state.cart.cart_count){
			return (
				<div>
					₹ {this.state.cart.summary.sale_price_total}
				</div>
			)
		}
	}

	loadCart() {
		let url = window.location.href.split("#")[0] + '#/cart';
        window.location = url;
	}

	fetchCart() {
		let cart_id = window.readFromLocalStorage('cart_id');
		if(cart_id){
			window.getCartByID(cart_id).then((cart_data)=>{
				this.setState({cart : cart_data})
				cart_data.items.forEach((item)=>{
					window.updateaddToCartComponent(item);
				})
			})
		}
	}
}

let domContainer = document.querySelector('#react-view-cart-container');
const ViewCartComponent = ReactDOM.render(e(viewCart), domContainer);


window.updateViewCartCompoent = (cartValue) => {
	console.log("inside updateViewCartCompoent", cartValue);
	ViewCartComponent.setState({cart : cartValue})
}
