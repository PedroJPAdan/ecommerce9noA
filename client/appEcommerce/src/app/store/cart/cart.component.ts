import { Component, OnInit } from '@angular/core';
import { Cart } from 'src/app/model/cart';
import { Product } from 'src/app/model/product';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {

  constructor(public cart: Cart) { }

  ngOnInit() {
  }

  updateQuantity(product: Product, quantity: number){
    return this.cart.updateQuantity(product,quantity);
  }
  
  deleteLine(productCode: string){
    return this.cart.deleteLine(productCode);
  }
}
