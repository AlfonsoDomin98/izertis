import { Component } from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Component({
  selector: 'app-operation',
  templateUrl: './operation.component.html',
  styleUrls: ['./operation.component.css']
})
export class OperationComponent {

  operations: string = '';
  operatorA: number = 0;
  operatorB: number = 0;
  result = '';
  url: string = 'http://localhost:443/';

  constructor(private http: HttpClient) { }

  public getResult() {
    this.http.get<any>(this.url + this.operations + '/' + this.operatorA + '/' + this.operatorB).subscribe(data => {
      this.result = 'Resultado: ' + data.result;

    });
  }
  changeOperation(option: any){
    let operatorB = document.getElementById('operatorB');
    if (operatorB === null) {
      return;
    }
    if(option.target.value === 'square-root'){
      operatorB.style.display = 'none';
      this.operatorB = 0;
    } else {
      operatorB.style.display = 'block';
    }
  }
}
