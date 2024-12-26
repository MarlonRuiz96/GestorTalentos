<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReporteModel extends CI_Model
{


	public function getApplicant($DPI)
	{
		$this->db->select('*');
		$this->db->from('applicants');
		$this->db->where('numero_documento', $DPI);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}

	}
	public function getFamilyData($plaza)
	{
		$this->db->select('*');
		$this->db->from('family_data');
		$this->db->where('applicant_id', $plaza);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}

	}

	public function getCapacitaciones($plaza)
	{
		$this->db->select('*');
		$this->db->from('capacitaciones');
		$this->db->where('applicant_id', $plaza);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}

	public function getSkills($plaza)
	{
		$this->db->select('*');
		$this->db->from('skills');
		$this->db->where('applicant_id', $plaza);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}

	public function getEconomicContributions($plaza)
	{
		$this->db->select('*');
		$this->db->from('economic_contributions');
		$this->db->where('applicant_id', $plaza);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}
	public function getSocialEconomicData($plaza)
	{
		$this->db->select('*');
		$this->db->from('social_economic_data');
		$this->db->where('applicant_id', $plaza);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}
	public function getHeathData($plaza)
	{
		$this->db->select('*');
		$this->db->from('health_data');
		$this->db->where('applicant_id', $plaza);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}
	public function getEmploymentPreferences($plaza)
	{
		$this->db->select('*');
		$this->db->from('employment_preferences');
		$this->db->where('applicant_id', $plaza);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}
	public function getLanguages($plaza)
	{
		$this->db->select('*');
		$this->db->from('languages');
		$this->db->where('applicant_id', $plaza);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result(); // Devuelve un array de objetos
		} else {
			return []; // Devuelve un array vacío si no hay registros

		}
	}

	public function getWorkExperience($plaza)
	{
		$this->db->select('*');
		$this->db->from('work_experience');
		$this->db->where('applicant_id', $plaza);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result(); // Devuelve un array de objetos
		} else {
			return []; // Devuelve un array vacío si no hay registros
		}
	}

	public function getReferences($plaza)
	{
		$this->db->select('*');
		$this->db->from('references');
		$this->db->where('applicant_id', $plaza);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result(); // Devuelve un array de objetos
		} else {
			return []; // Devuelve un array vacío si no hay registros
		}
	}

	public function getCurrentStudies($plaza)
	{
		$this->db->select('*');
		$this->db->from('current_studies');
		$this->db->where('applicant_id', $plaza);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result(); // Devuelve un array de objetos
		} else {
			return []; // Devuelve un array vacío si no hay registros
		}
	}
	public function getEducationalHistory($plaza)
	{
		$this->db->select('*');
		$this->db->from('educational_history');
		$this->db->where('applicant_id', $plaza);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result(); // Devuelve un array de objetos
		} else {
			return []; // Devuelve un array vacío si no hay registros
		}
	}


	public function getCandidatoPorId($idCandidato)
	{
		$this->db->select('*');
		$this->db->from('Candidato');
		$this->db->where('idCandidato', $idCandidato);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}

	}
}
