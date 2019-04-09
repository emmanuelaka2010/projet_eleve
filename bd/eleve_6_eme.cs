using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Groupe_eleve
{
    #region Eleve__eme
    public class Eleve__eme
    {
        #region Member Variables
        protected int _id_eleve_;
        protected string _nom;
        protected string _prenom;
        protected string _classe;
        protected string _photo;
        protected unknown _date_naissance;
        protected string _lieu_naissance;
        #endregion
        #region Constructors
        public Eleve__eme() { }
        public Eleve__eme(string nom, string prenom, string classe, string photo, unknown date_naissance, string lieu_naissance)
        {
            this._nom=nom;
            this._prenom=prenom;
            this._classe=classe;
            this._photo=photo;
            this._date_naissance=date_naissance;
            this._lieu_naissance=lieu_naissance;
        }
        #endregion
        #region Public Properties
        public virtual int Id_eleve_
        {
            get {return _id_eleve_;}
            set {_id_eleve_=value;}
        }
        public virtual string Nom
        {
            get {return _nom;}
            set {_nom=value;}
        }
        public virtual string Prenom
        {
            get {return _prenom;}
            set {_prenom=value;}
        }
        public virtual string Classe
        {
            get {return _classe;}
            set {_classe=value;}
        }
        public virtual string Photo
        {
            get {return _photo;}
            set {_photo=value;}
        }
        public virtual unknown Date_naissance
        {
            get {return _date_naissance;}
            set {_date_naissance=value;}
        }
        public virtual string Lieu_naissance
        {
            get {return _lieu_naissance;}
            set {_lieu_naissance=value;}
        }
        #endregion
    }
    #endregion
}