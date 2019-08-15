import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { StoreModule } from './store/store.module';
import { HttpClientModule } from '@angular/common/http';
import { Storeguard } from './storeguard';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    StoreModule,
    HttpClientModule
  ],
  providers: [Storeguard],
  bootstrap: [AppComponent]
})
export class AppModule { }
