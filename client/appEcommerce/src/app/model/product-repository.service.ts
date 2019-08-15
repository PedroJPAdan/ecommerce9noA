import { Injectable } from '@angular/core';
import { Product } from './product';
import { ProductDatasourceService } from './product-datasource.service';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class ProductRepositoryService {

  private products: Product[] = [];
  private productCode: string[] =[];
  private categories: string[] = [];
  private scales: string[] = [];
  private vendors: string[] = [];
  
  constructor(private dataSourceService: ProductDatasourceService) {
    dataSourceService.getProducts().subscribe((response) =>{
      this.products = response['products'];
      this.productCode = response['products'].map(p => p.productCode).filter((c, index, array) => array.indexOf(c) === index).sort();
      this.categories = response['products'].map(p => p.productLine).filter((c, index, array) => array.indexOf(c) === index).sort();
      this.scales = response['products'].map(p => p.productScale).filter((c, index, array) => array.indexOf(c) === index).sort();
      this.vendors = response['products'].map(p => p.productVendor).filter((c, index, array) => array.indexOf(c) === index).sort();
      //console.log(this.categories);
    });
   }

   getProducts(productLine: string= null,productScale: string= null, productVendor: string= null): Product[]{
     return this.products.filter((p)=> productLine == null || p.productLine === productLine)
     .filter((p)=> productScale == null || p.productScale === productScale)
     .filter((p)=> productVendor == null || p.productVendor === productVendor);
   }

   getProduct(productCode: string){
     return this.products.filter((p)=>p.productCode === productCode);
   }
   getCategories(): string[]{
     return this.categories;
   }

  getScales(): string[]{
    return this.scales;
  }

  getVendors(): string[]{
    return this.vendors;
  }

}
