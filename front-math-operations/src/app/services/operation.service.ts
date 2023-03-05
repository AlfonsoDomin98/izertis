import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class OperationService {

  url: string = 'http://localhost:443/';
  constructor(private http: HttpClient) { }

  public getResult(operation: string, operatorA: number, operatorB: number){
    let result = 0;
    this.http.get<any>(this.url + operation + '/'+ operatorA + '/' + operatorB).subscribe(data => {
      result = data.result;

    });
  }
}
