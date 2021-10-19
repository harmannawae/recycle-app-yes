import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { SessionService } from '../session/session.service';

@Component({
  selector: 'app-register-admin',
  templateUrl: './register-admin.page.html',
  styleUrls: ['./register-admin.page.scss'],
})
export class RegisterAdminPage implements OnInit {
  user_name = "";
  user_lastname = "";
  user_phone = "";
  user_address = "";
  username = "";
  password = "";
  constructor(
    private router: Router,
    public session: SessionService
  ) { }

  ngOnInit() {
  }
  async save() {
    // เอาข้อมูลบันทึกลงฐานข้อมูล
    this.session.ajax(this.session.api + "register.php", {
      user_name: this.user_name,
      user_lastname: this.user_lastname,
      user_phone: this.user_phone,
      user_address: this.user_address,
      username: this.username,
      password: this.password
    }, true).then((res: any) => {
      this.session.showAlert(res.msg).then(rs => {
        this.router.navigateByUrl('/manage-member');
      });
    }).catch(err => {
      this.session.showAlert(err);
    });
  }
}