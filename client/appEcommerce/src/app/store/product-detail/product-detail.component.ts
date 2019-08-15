import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, ParamMap } from '@angular/router';
import { switchMap } from 'rxjs/operators';
import { Product } from 'src/app/model/product';
import { StoreComponent } from '../store.component';
import { ProductRepositoryService } from 'src/app/model/product-repository.service';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-product-detail',
  templateUrl: './product-detail.component.html',
  styleUrls: ['./product-detail.component.css']
})
export class ProductDetailComponent implements OnInit {

  product$: Observable<Product>;
  constructor(private route: ActivatedRoute, private router:Router, private service: ProductRepositoryService) { }

  ngOnInit() {
    this.product$ = this.route.paramMap.pipe(
      switchMap((params: ParamMap) => this.service.getProduct(params.get('id')))
    );
    //7let id = this.route.snapshot.paramMap.get('id');
    //this.product$ = this.service.getProduct(id);
  }

  gotoProducts(){
    this.router.navigate(['/products']);
  }
}
