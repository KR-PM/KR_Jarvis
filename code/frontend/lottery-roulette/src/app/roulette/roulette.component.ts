import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Apollo, gql, QueryRef } from 'apollo-angular';
import { DrawName, Maybe } from '../core/schema';

@Component({
  selector: 'app-roulette',
  templateUrl: './roulette.component.html',
  styleUrls: ['./roulette.component.scss']
})
export class RouletteComponent implements OnInit {
  rotateAngle: any = 0 // 将要旋转的角度
  startRotatingDegree: any = 0 // 初始旋转角度
  rotateTransition: any = '' // 控制过渡效果
  click_flag: boolean = true // 是否可以旋转抽奖

  drawList: Maybe<DrawName> | undefined;
  winner: Maybe<DrawName> | undefined | unknown;

  constructor(
    private apollo: Apollo,
    private router: Router,
  ) { }

  ngOnInit(): void {
    // this.getDrawList();
    // this.DrawRender();
  }

  async DrawRender() {
    const m = gql`
      mutation drawNames {
        draw {
          id
          name
        }
      }
    `;
    const resp = await this.apollo.mutate({mutation: m}).toPromise();
    if (resp) {
      this.winner = resp.data;
      console.log(this.winner)
    }
  }

  async getDrawList() {
    const q = gql`
      query drawNames {
        draw_names {
          id
          name
        }
      }
    `;
    const resp = await this.apollo.query<any>({ query: q }).toPromise();
    if (resp) {
      this.drawList = resp.data?.draw_names;
      console.log(this.drawList)
    }
  }
  
  pointer(price: any) {
    this.rotate(price);
  }

  // 轮盘转动
  rotate(prize: any) {
    var type = 0; // 默认为 0  转盘转动
    var randCircle = 50; // 附加旋转的圈数
    var duringTime = 5; // 默认为 5s 转动时间
    var rotateAngle = 10; //初始值

    switch (prize) {
      case 0: rotateAngle = randCircle * 360 + 55; break;
      case 10: rotateAngle = randCircle * 360 + 20; break;
      case 20: rotateAngle = randCircle * 360 + -15; break;
      case 50: rotateAngle = randCircle * 360 + -50; break;
      case 100: rotateAngle = randCircle * 360 + -85; break;
      case 200: rotateAngle = randCircle * 360 + -120; break;
      case 500: rotateAngle = randCircle * 360 + -165; break;
      case 1000: rotateAngle = randCircle * 360 + -200; break;
      case 2000: rotateAngle = randCircle * 360 + -235; break;
      case 4999: rotateAngle = randCircle * 360 + -270; break;
    }
    this.click_flag = false; // 旋转结束前，不允许再次触发
    if (type == 0) {
      var rotateAngle = this.startRotatingDegree + rotateAngle - this.startRotatingDegree % 360;//将要旋转的角度
      this.startRotatingDegree = rotateAngle; //改变初始旋转的角度
      this.rotateAngle = "translate(-50%, -50%) rotate(" + rotateAngle + "deg)"; //真正控制转动角度

      // 旋转结束后允许再次触发
      setTimeout(() => {
        this.click_flag = true; //旋转结束后可点击
        // this.getturntable() //更新数据
      }, duringTime * 1000)
    }
  }

  // 开奖
  onClick1(type: number) {
    if (this.click_flag == true) {  //此处主要为防止重复点击
      this.click_flag = false // 防止转动时点击，点击后禁止重复点击
      setTimeout(() => {
        console.log('call API')
        this.pointer(type)//传入金额
      }, 1000);
    } else {
      return
    }
  }
}
