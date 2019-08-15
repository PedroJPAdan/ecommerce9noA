import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { StoreComponent } from './store/store.component';
import { CartComponent } from './store/cart/cart.component';
import { CheckoutComponent } from './store/checkout/checkout.component';
import { PageNotFoundComponent } from './store/page-not-found/page-not-found.component';
import { Storeguard } from './storeguard';
import { ProductDetailComponent } from './store/product-detail/product-detail.component';

const routes: Routes = [
  {path: 'store', component: StoreComponent, canActivate:[Storeguard]},
  {path: 'cart', component: CartComponent, canActivate:[Storeguard]},
  {path: 'checkout', component: CheckoutComponent, canActivate:[Storeguard]},
  {path: 'product/:id', component: ProductDetailComponent},
  {path: '', redirectTo: '/store', pathMatch: 'full'},
  {path: '**', component: PageNotFoundComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
  providers: [Storeguard]
})
export class AppRoutingModule { }
