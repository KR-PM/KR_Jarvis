import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { RouletteComponent } from './roulette/roulette.component';

const routes: Routes = [
  {
    path: 'roulette',
    component: RouletteComponent
  },
  {
    path: '**',
    redirectTo: '/roulette',
    pathMatch: 'full'
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
