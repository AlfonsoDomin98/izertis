import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {OperationComponent} from "./pages/operation/operation.component";

const routes: Routes = [
  {path:'', component:OperationComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
