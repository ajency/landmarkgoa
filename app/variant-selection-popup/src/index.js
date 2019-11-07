'use strict';

const e = React.createElement;

class variantSelection extends React.Component {
	constructor(props) {
		super(props);
		this.state = { 
			// apiEndPoint : 'http://localhost:5000/project-ggb-dev/us-central1/api/rest/v1',
			// apiEndPoint : 'https://us-central1-project-ggb-dev.cloudfunctions.net/api/rest/v1',
			apiEndPoint : 'https://asia-east2-project-ggb-dev.cloudfunctions.net/api/rest/v1',
			variants : [], // variants fetched from firestore
			selectedVariant : '',
			productId : '',
			title : ''
		};
	}

	render() {
		return (
		    <div className="custom-modal" id="variation-selection-popup">
			    <div className="custom-modal-content p-15">
				<button type="button" className="btn-reset close-modal" onClick={()=> this.hideVariantModal()}><i class="fas fa-times text-silver"></i></button>
			        <div className="product-variant text-left text-black">
					  <h3 class="h1 ft6 pr-4">Choose your Bowl</h3>
					  <div class="list-meta mt-4 mb-4">
						<div class="list-author">{this.state.title}</div>
						<div class="list-date">Veg</div>
					  </div>				          
			          <div className="variant-list mb-4">
			          		{this.getVariants()}
			          </div>
			        </div>
			        <div className="custom-modal-footer d-flex justify-content-between">
			          <button type="button" className="btn-reset btn-continue btn-arrow font-size-15 text-uppercase p-15 bg-primary text-white text-left w-100 position-relative" onClick={()=>this.addToCart(this.state.selectedVariant)} >Select & Continue</button>
			        </div>
			    </div>
			</div>
		);
	}

	getVariants(){
		if(this.state.variants.length){
			let variants = this.state.variants.map((variant)=>{
				return (
					<div key={variant.id} className="list-item pt-3 pb-3 border-bottom-lightgrey">
			              <label className="custom-radio-btn mb-0 font-size-16">
			              		<span className={"mr-3 " + (this.state.selectedVariant == variant.id ? 'text-primary' : '') }>{variant.size}</span> ₹ {variant.sale_price}
			                	<input type="radio" name={"variant-" + this.state.productId} value={variant.id} checked={this.state.selectedVariant == variant.id} onChange={(event) => this.handleOptionChange(event)} />
			                	<span className="checkmark"></span>
			              </label>
					</div>
				)
			})
			return variants;
		}
		else{
			return (
				<div className="list-item pt-3 pb-3 border-bottom-lightgrey">
		              <div className="text-line mb-3">
		              </div>
		              <div className="text-line mb-3">
		              </div>
		              <div className="text-line">
		              </div>
				</div>
			)
		}
	}

	showVariantModal(product_id, last_selected){
		this.fetchVariants(product_id, last_selected);
		document.querySelector('#variation-selection-popup').classList.add('show-modal');
		document.querySelectorAll('.product-wrapper')
			.forEach((domContainer) => {
				domContainer.classList.add('transform-none');
			});
		let product_element = document.querySelector('#product-'+this.state.productId)
		if(product_element)
			product_element.classList.add('zindex');
		window.hideScroll();
	}

	hideVariantModal(){
		document.querySelector('#variation-selection-popup').classList.remove('show-modal');
		document.querySelectorAll('.product-wrapper')
			.forEach((domContainer) => {
				domContainer.classList.remove('transform-none');
			});
		let product_element = document.querySelector('#product-'+this.state.productId)
		if(product_element)
			product_element.classList.remove('zindex');
		window.showScroll();
	}


	handleOptionChange(event){
		this.setState({selectedVariant : event.target.value });
	}


	fetchVariants(product_id, last_selected){
		let url = this.state.apiEndPoint + "/misc/fetch-variants";
		let body = {
			product_id 	: product_id,
		}

		axios.get(url, {params : body})
		.then((res) => {
			if(res.data.success){
				if(!last_selected){
					this.setState({variants : res.data.variants, selectedVariant : res.data.variants[0].id});
				}
				else{
					this.setState({variants : res.data.variants, selectedVariant : last_selected});
				}
			}
		})
		.catch((error)=>{
			console.log("error in add to cart ==>", error);
		})
	}

	addToCart(variant_id = null) {
		this.hideVariantModal();
		let cart_id = window.readFromLocalStorage('cart_id');
		window.addToCartFromVariant(this.state.productId, variant_id);
	}
}


let domContainer = document.querySelector('#react-variant-selection-modal');
const VariantSelectionComponent = ReactDOM.render(e(variantSelection), domContainer);


window.showVariantSelectionPopup = (product_id, last_selected, title) => {
	console.log("inside updateViewCartCompoent", product_id, last_selected);
	VariantSelectionComponent.setState({variants : [], productId : product_id, title : title});
	VariantSelectionComponent.showVariantModal(product_id, last_selected);
}

function hideVariantSelectionPopup(event) {
	if(event.target == document.querySelector('#variation-selection-popup'))
    	VariantSelectionComponent.hideVariantModal();
}

window.addEventListener("click", hideVariantSelectionPopup);
