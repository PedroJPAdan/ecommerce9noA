import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

const PROTOCOL = 'http';

@Injectable({
  providedIn: 'root'
})
export class ProductDatasourceService {

  private bassUrl: string;


  constructor(private httpClient: HttpClient) { 
   this.bassUrl = `${PROTOCOL}://${location.hostname}/ecommerce/api`; 
  };

  getProducts(): any{
    return this.httpClient.get(this.bassUrl + '/products');
  }
}
