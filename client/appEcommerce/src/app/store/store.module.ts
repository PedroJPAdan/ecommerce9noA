import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { StoreComponent } from './store.component';
import { NavComponent } from './nav/nav.component';
import { FooterComponent } from './footer/footer.component';
import { CartSummaryComponent } from './cart-summary/cart-summary.component';
import { Cart } from '../model/cart';
import { CartComponent } from './cart/cart.component';
import { CheckoutComponent } from './checkout/checkout.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { Storeguard } from '../storeguard';
import { RouterModule } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';
import { ProductDetailComponent } from './product-detail/product-detail.component';

@NgModule({
  declarations: [StoreComponent, NavComponent, FooterComponent, CartSummaryComponent, CartComponent, CheckoutComponent, PageNotFoundComponent, ProductDetailComponent],
  imports: [
    CommonModule,
    HttpClientModule,
    RouterModule
  ],
  exports: [
    StoreComponent
  ],
  providers:[
    Cart, Storeguard
  ]
})
export class StoreModule { }
