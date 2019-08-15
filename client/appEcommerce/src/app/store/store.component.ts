import { Component, OnInit } from '@angular/core';
import { ProductRepositoryService } from '../model/product-repository.service';
import { Product } from '../model/product';
import { Cart } from '../model/cart';
import { Router } from '@angular/router';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.css']
})
export class StoreComponent implements OnInit {
  public selectedCategory = null;
  public productsperPage=12;
  public selectedPage=1;
  public selectedSecale = null;
  public selectedVendor = null;
  constructor(private productRepoService: ProductRepositoryService, private cart: Cart, private router: Router) { }

  ngOnInit() {
   // console.log(this.productRepoService.getProducts());
  }

  get products():Product[]{
    const pageIndex =(this.selectedPage-1)*this.productsperPage
    return this.productRepoService.getProducts(this.selectedCategory,this.selectedSecale,this.selectedVendor)
    .slice(pageIndex, pageIndex+this.productsperPage);
  }

  get categories(): string[]{
    return this.productRepoService.getCategories();
  }

  changeCategory(newCategory?: string){
    this.selectedPage = 1;
    this.selectedCategory = newCategory;
  }

  get pageNumbers(): number[]{
    return Array(Math.ceil(this.productRepoService.getProducts(this.selectedCategory)
    .length/ this.productsperPage)).fill(0).map((x,i) => i+1);
  }

  changePage(newNumber: number){
    this.selectedPage = newNumber;
  }

  changePageSize(newSize: number){
    this.productsperPage = newSize;
    this.changePage(1);
  }
//////////////////////////////////////////////////////////////////
  get scales(): string[]{
    return this.productRepoService.getScales();
  }

  changeScale(newScale?: string){
    this.selectedPage = 1;
    this.selectedSecale = newScale;
  }
  ///////////////////////////////////////////////////////////////
    get vendors(): string[]{
    return this.productRepoService.getVendors();
  }

  changeVendor(newVendor?: string){
    this.selectedPage = 1;
    this.selectedVendor = newVendor;
  }

  //////////////////////////////Cart///////////////////////////////////

  addLine(product: Product){
    this.cart.addLine(product);
  }

}
