'use strict';
const e = React.createElement;

const divStyle = {
	// display : 'flex',
	// 'justify-content': 'space-between',
	// 'background' : '#A3DE9A'
}

const btnStyle = {
	cursor : 'pointer'
}

class viewCart extends React.Component {
	constructor(props) {
		super(props);
		this.state = { 
			// apiEndPoint : 'http://localhost:5000/project-ggb-dev/us-central1/api/rest/v1',
			// apiEndPoint : 'https://us-central1-project-ggb-dev.cloudfunctions.net/api/rest/v1',
			apiEndPoint : 'https://asia-east2-project-ggb-dev.cloudfunctions.net/api/rest/v1',
			cart : null,
		};
	}

	componentDidMount(){
		this.fetchCart();
	}

	render() {
			return (
				<div style={divStyle} className={(!this.state.cart || !this.state.cart.cart_count ? 'd-none' : '')}>
						{this.getItemsCount()}
						{/* {this.getCartTotal()} */}
					<div id="view-cart-btn" style={btnStyle} onClick={() => this.loadCart()}>
						VIEW CART
					</div>
				</div>
			);
	}

	getItemsCount(){
		if(this.state.cart && this.state.cart.cart_count){
			return (
				<div className="">
					<div className="cart-count d-inline-block d-lg-flex">
						{this.state.cart.cart_count} 
					</div>
					<span className="d-inline-block d-lg-none">items(s)</span>
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
		// window.checkPushNotificationPermissions();
		let url = window.location.href.split("#")[0] + '#/cart';
        window.location = url;
	}

	async fetchCart() {
		let cart_id = window.readFromLocalStorage('cart_id');
		if(cart_id){
			let cart_data = await window.getCartByID(cart_id);
			this.setState({cart : cart_data})
			cart_data.items.forEach((item)=>{
				window.updateaddToCartComponent(item);
			})
			// let url = this.state.apiEndPoint + "/anonymous/cart/fetch";
			// let body = {
			// 	cart_id : cart_id
			// }
			// axios.get(url, {params : body})
			// 	.then((res) => {
			// 		this.setState({cart : res.data.cart})
			// 		res.data.cart.items.forEach((item)=>{
			// 			window.updateaddToCartComponent(item);
			// 		})
			// 	})
			// 	.catch((error)=>{
			// 		console.log("error in fetch cart ==>", error);
			// 	})


		}
	}
}

let domContainer = document.querySelector('#react-view-cart-container');
const ViewCartComponent = ReactDOM.render(e(viewCart), domContainer);


window.updateViewCartCompoent = (cartValue) => {
	console.log("inside updateViewCartCompoent", cartValue);
	ViewCartComponent.setState({cart : cartValue})
}
